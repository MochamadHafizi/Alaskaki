<?php 
class Rajaongkir extends CI_Controller{
    private $api_key = '905c4f321f071d49ae8c9cd98f7fd68e';
    public function __construct(){
        parent::__construct();
        $this->load->model('model_user');

    }
    public function provinsi(){
        

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER =>0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: $this->api_key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
   $array_response = json_decode($response,true);
   //echo '<pre>';
//print_r($array_response['rajaongkir']['results']);
  // echo '</pre>';
$data_provinsi = $array_response['rajaongkir']['results'];
echo "<option value=''>--Pilih Provinsi--</option>";
foreach ($data_provinsi as $key => $value) {
    echo "<option value='". $value['province']."' id_provinsi='". $value['province_id']."'>". $value['province']."</option>";
}
}
 }
 public function kota(){
     $id_provinsi_terpilih = $this->input->post('id_provinsi');
     $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_provinsi_terpilih,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER =>0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: $this->api_key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $array_response = json_decode($response,true);
  $data_kota = $array_response['rajaongkir']['results'];
echo "<option value=''>--Pilih Kota--</option>";
foreach ($data_kota as $key => $value) {
    echo "<option value='". $value['city_name'] ."' id_kota='". $value['city_id'] ."'>". $value['city_name']."</option>";
}
}
 }
    public function expedisi(){
        echo '<option value="">--Pilih Expedisi--</option>';
        echo '<option value="jne">JNE</option>';
        echo '<option value="tiki">TIKI</option>';
        echo '<option value="pos">POS Indonesia</option>';
    }
    public function paket(){
        $id_kota_asal = $this->model_user->data_setting()->lokasi;
        $expedisi = $this->input->post('expedisi');
        $id_kota = $this->input->post('id_kota');
        $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER =>0,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=".$id_kota_asal."&destination=".$id_kota."&weight=900&courier=" . $expedisi,
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: $this->api_key"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  $array_response = json_decode($response,true);
//  echo '<pre>';
// print_r($array_response['rajaongkir']['results'][0]['costs']);
//   echo '</pre>';
$data_paket = $array_response['rajaongkir']['results'][0]['costs'];
echo "<option value=''>--Pilih Paket--</option>"; 
    foreach ($data_paket as $key => $value) {
        echo "<option value='" .$value['service']."' ongkir='" .$value['cost'][0]['value']."'estimasi='".$value['cost'][0]['etd']."'>";
        echo $value['service']. " | Rp. ".$value['cost'][0]['value']. " | ".$value['cost'][0]['etd']." Hari";
        echo "</option>";
    }
}
    }
}