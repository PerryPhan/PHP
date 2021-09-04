<?php
require_once 'vendor/autoload.php';
require_once 'class-db.php';
require_once 'models/SheetValuesModel.php';

define('GOOGLE_CLIENT_ID','261493543165-mvfqfakg8l0ileh5213kiarl67l23vdk.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET','HEy0tGO1jBMsFRrfp4MpEt07');
define('EOF',"<br/>");
define('FULL_RANGE','A1:Z1');
define('DATE_FORMAT','d/m/Y');

use Hybridauth\Provider\Google;
/**
 * Controlling API from Google Sheet
 * 
 * @created 03/09/2021 
 */
class GoogleSheetApiController
{
    /**
     * To hold all configurations to Google Sheet
     * @var Array
     */
    private array $configuration;

    /**
     * @var Google
     */
    private $adapter;

    /**
     * @var Google_Client
     */
    private $client;

    /**
     * @var DB
     */
    private $db;

    /**
     * @var string 
     */
    private $sheetID;
    
    /**
     * Constructor of class
     */
    function __construct()
    {
    }

    /**
     * Run when need
     * @return void
     */
    function init(): void{
       $this->config();
       $this->callback();
    }

    /**
     * Need to be run first
     * @return void
     */
    private function config(): void
    {
        $config = [
            'callback' => 'http://localhost/tvs/callback.php',
            'keys'     => [
                'id' =>  GOOGLE_CLIENT_ID,
                'secret' =>  GOOGLE_CLIENT_SECRET
            ],
            'scope'    => 'https://www.googleapis.com/auth/spreadsheets',
            'authorize_url_parameters' => [
                'approval_prompt' => 'force', // to pass only when you need to acquire a new refresh token.
                'access_type' => 'offline'
            ]
        ];
        $this->setConfiguration($config);
        $this->adapter = new Google($this->configuration);


    }

    /**
     * Access tokens to API Google Server
     * @return void 
     */
    private function callback(): void
    {
        try {
            $this->adapter->authenticate();
            $token = $this->adapter->getAccessToken();
            $this->db = new DB();
            $this->db->update_access_token(json_encode($token));
            echo "Access token inserted successfully.";
        }
        catch( Exception $e ){
            echo $e->getMessage() ;
        }
    }

    /**
     * Create OAuth Client to use function, automatically pass to $this->client
     * @return void  
     */
    public function createClient(): void
    {
        $this->client = new Google_Client();
  
        $this->db = new DB();
    
        $arr_token = (array) $this->db->get_access_token();
        $accessToken = array(
            'access_token' => $arr_token['access_token'],
            'expires_in' => $arr_token['expires_in'],
        );

        $this->client->setAccessToken($accessToken);
    }

    /**
     * Deactivate OAuth Client if caught 401 error, pass to $this->client also $this->db
     * @return void
     */
    private function reactiveClient(): void{
        $refresh_token = $this->db->get_refersh_token();
    
        $this->client = new GuzzleHttp\Client(['base_uri' => 'https://accounts.google.com']);

        $response = $this->client->request('POST', '/o/oauth2/token', [
            'form_params' => [
                "grant_type" => "refresh_token",
                "refresh_token" => $refresh_token,
                "client_id" => GOOGLE_CLIENT_ID,
                "client_secret" => GOOGLE_CLIENT_SECRET,
            ],
        ]);

        $data = (array) json_decode($response->getBody());
        $data['refresh_token'] = $refresh_token;

        $this->db->update_access_token(json_encode($data));
    }

    /**
     * Creating Google Sheet thourgh API 
     * @return string 
     */
    public function createSheet(): string
    {
        $this->createClient();
        $service = new Google_Service_Sheets($this->client);
    
        try {
            $spreadsheet = new Google_Service_Sheets_Spreadsheet([
                'properties' => [
                    'title' => 'API Sheet'
                ]
            ]);
            $spreadsheet = $service->spreadsheets->create($spreadsheet, [
                'fields' => 'spreadsheetId'
            ]);
            
            $this->sheetID = $spreadsheet->spreadsheetId;
        } catch(Exception $e) {
            if( 401 == $e->getCode() ) {
                // When get error 401 - Unauthorized
                $this->reactiveClient();
                // Call back 
                $this->createSheet();
            } else {
                echo $e->getMessage(); //print the error just in case your sheet is not created.
            }
        }
        
        return $this->sheetID ?? '' ;
    }

    /**
     * Writing Google Sheet thourgh API, For Label only  
     *
     * @param string $spreadsheetId
     * @param SheetValuesModel $sheetValuesModel
     * @return void 
     */
    public function writeLabelSheet( string $spreadsheetId = '',SheetValuesModel $sheetValuesModel): void
    {
        $this->createClient();
        if( $spreadsheetId === ''  ){ 
            $spreadsheetId =  $this->sheetID;
        }
        $service = new Google_Service_Sheets($this->client);
        $range  =  $sheetValuesModel->getRange();
        $values =  $sheetValuesModel->getValues();
        try {
            
            $body = new Google_Service_Sheets_ValueRange([
                'values' => $values
            ]);
            $params = [
                'valueInputOption' => 'USER_ENTERED'
            ];
            $result = $service->spreadsheets_values->update($spreadsheetId, $range, $body, $params);
        } catch(Exception $e) {
            if( 401 == $e->getCode() ) {
                $this->reactiveClient();
                
                $this->writeLabelSheet($spreadsheetId);

            } else {
                echo $e->getMessage(); //print the error just in case your data is not added.
            }
        }
    }

    /**
     * Reading Google Sheet and return String thourgh API 
     * @return SheetValuesModel
     */
    public function readSheet($spreadsheetId = '', string $range = 'A:Z') 
    {
        $this->createClient();
        if( $spreadsheetId === '' ){ 
            $spreadsheetId =  $this->sheetID;
        }

        $model = new SheetValuesModel();
        $model->setRange($range);

        $service = new Google_Service_Sheets($this->client);
        try {
            
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $values = $response->getValues();
            $model->setValues($values);

        } catch(Exception $e) {
            if( 401 == $e->getCode() ) {
                
                $this->reactiveClient();

                readSheet($spreadsheetId);

            } else {
                echo $e->getMessage(); //print the error just in case your data is not read.
            }
        }

        return $model;
    }

    /**
     * Appending to exsited Google Sheet thourgh API, For Value only
     * 
     * @param string $spreadsheetId
     * @param Model $sheetValueModel
     * @return void 
     */
    public function appendSheet(string $spreadsheetId = '',SheetValuesModel $sheetValuesModel): void 
    {
        $this->createClient();
        if( $spreadsheetId === '' ){ 
            $spreadsheetId =  $this->sheetID;
        }
      
        $service = new Google_Service_Sheets($this->client);
        $range  =  $sheetValuesModel->getRange();
        $values =  $sheetValuesModel->getValues();
        
        try {
            $body = new Google_Service_Sheets_ValueRange([
                'values' => $values
            ]);
            $params = [
                'valueInputOption' => 'USER_ENTERED'
            ];
            $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
        } catch(Exception $e) {
            if( 401 == $e->getCode() ) {
                
                $this->reactiveClient();

                appendSheet($spreadsheetId);
            } else {
                echo $e->getMessage(); //print the error just in case your data is not appended.
            }
        }
    }

    /**
     * Testing with example 
     * @return void
     */
    public function testing(){
        $controller = new GoogleSheetApiController();
        $labels = new SheetValuesModel();

        $labels->setRange(FULL_RANGE);
        $labels->setValues([
            ['Tên post', 'Link post', 'Lượt like yêu cầu', 'Lượt comment yêu cầu', 'Họ Tên', 'Email', 'Sđt', 'Ngày nhập'],
        ]);

        // Dataset
        $dataset = new SheetValuesModel();

        $dataset->setRange(FULL_RANGE);
        $customer1_input = ['Dai','dai',10,10];
        $customer2_input = ['Duc','duc',15,15];
        $customer3_input = ['Dong','dong',20,20];
        $date = date(DATE_FORMAT);

        $dataset->setValues([
            [...$customer1_input,'Phan Dai','daiphan@gmail.com',"'0123456789",$date],
            [...$customer2_input,'Hoang Phan Minh Duc','minhduc@gmail.com',"'04567891234",$date],
            [...$customer3_input,'Duong Truc Dong','trucdong@gmail.com',"'0123491234",$date],
        ]);

        echo $dataset->toString();

        $controller->createSheet();
        $controller->writeLabelSheet('', $labels);
        $controller->appendSheet('', $dataset);
        $controller->readSheet();
    }
    /**
     * Set Configuration
     * @param 
     */
    public function setConfiguration(?array $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Get Configuration
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }
}

$controller = new GoogleSheetApiController();
$controller->testing();
