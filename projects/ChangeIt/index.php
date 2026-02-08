<?php
/**
 * CHANGEIT! - Versión Final con Favicon
 */
require_once 'config/db.php';

// 1. DICCIONARIO COMPLETO
$nombres_monedas = [
    "AED" => "Dirham de Emiratos Árabes", "AFN" => "Afgani Afgano", "ALL" => "Lek Albanés", "AMD" => "Dram Armenio",
    "ANG" => "Florín Antillano", "AOA" => "Kwanza Angoleño", "ARS" => "Peso Argentino", "AUD" => "Dólar Australiano",
    "AWG" => "Florín Arubeño", "AZN" => "Manat Azerbaiyano", "BAM" => "Marco de Bosnia", "BBD" => "Dólar de Barbados",
    "BDT" => "Taka de Bangladesh", "BGN" => "Lev Búlgaro", "BHD" => "Dinar Bahreiní", "BIF" => "Franco Burundés",
    "BMD" => "Dólar Bermudeño", "BND" => "Dólar de Brunei", "BOB" => "Boliviano", "BRL" => "Real Brasileño",
    "BSD" => "Dólar Bahameño", "BTN" => "Gultrum Butanés", "BWP" => "Pula de Botsuana", "BYN" => "Rublo Bielorruso",
    "BZD" => "Dólar Beliceño", "CAD" => "Dólar Canadiense", "CDF" => "Franco Congoleño", "CHF" => "Franco Suizo",
    "CLP" => "Peso Chileno", "CNY" => "Yuan Chino", "COP" => "Peso Colombiano", "CRC" => "Colón Costarricense",
    "CUP" => "Peso Cubano", "CVE" => "Escudo Caboverdiano", "CZK" => "Corona Checa", "DJF" => "Franco Yibutiano",
    "DKK" => "Corona Danesa", "DOP" => "Peso Dominicano", "DZD" => "Dinar Argelino", "EGP" => "Libra Egipcia",
    "ERN" => "Nakfa Eritreo", "ETB" => "Birr Etíope", "EUR" => "Euro", "FJD" => "Dólar Fijiano",
    "FKP" => "Libra de las Malvinas", "FOK" => "Corona Feroesa", "GBP" => "Libra Esterlina", "GEL" => "Lari Georgiano",
    "GGP" => "Libra de Guernsey", "GHS" => "Cedi Ganés", "GIP" => "Libra de Gibraltar", "GMD" => "Dalasi Gambiano",
    "GNF" => "Franco Guineano", "GTQ" => "Quetzal Guatemalteco", "GYD" => "Dólar Guyanés", "HKD" => "Dólar de Hong Kong",
    "HNL" => "Lempira Hondureño", "HRK" => "Kuna Croata", "HTG" => "Gourde Haitiano", "HUF" => "Forinto Húngaro",
    "IDR" => "Rupia Indonesia", "ILS" => "Nuevo Shéquel Israelí", "IMP" => "Libra de Man", "INR" => "Rupia India",
    "IQD" => "Dinar Iraquí", "IRR" => "Rial Iraní", "ISK" => "Corona Islandesa", "JEP" => "Libra de Jersey",
    "JMD" => "Dólar Jamaiquino", "JOD" => "Dinar Jordano", "JPY" => "Yen Japonés", "KES" => "Chelín Keniano",
    "KGS" => "Som Kirguís", "KHR" => "Riel Camboyano", "KID" => "Dólar de Kiribati", "KMF" => "Franco Comorense",
    "KRW" => "Won Surcoreano", "KWD" => "Dinar Kuwaití", "KYD" => "Dólar Caimano", "KZT" => "Tenge Kazajo",
    "LAK" => "Kip Laosiano", "LBP" => "Libra Libanesa", "LKR" => "Rupia de Sri Lanka", "LRD" => "Dólar Liberiano",
    "LSL" => "Loti Lesothense", "LYD" => "Dinar Libio", "MAD" => "Dirham Marroquí", "MDL" => "Leu Moldavo",
    "MGA" => "Ariary Malgache", "MKD" => "Denar Macedonio", "MMK" => "Kyat Birmano", "MNT" => "Tugrik Mongol",
    "MOP" => "Pataca de Macao", "MRU" => "Ouguiya Mauritana", "MUR" => "Rupia Mauriciana", "MVR" => "Rufiyaa Maldiva",
    "MWK" => "Kwacha Malauí", "MXN" => "Peso Mexicano", "MYR" => "Ringgit Malayo", "MZN" => "Metical Mozambiqueño",
    "NAD" => "Dólar Namibio", "NGN" => "Naira Nigeriana", "NIO" => "Córdoba Nicaragüense", "NOK" => "Corona Noruega",
    "NPR" => "Rupia Nepalí", "NZD" => "Dólar Neozelandés", "OMR" => "Rial Omaní", "PAB" => "Balboa Panameño",
    "PEN" => "Sol Peruano", "PGK" => "Kina de Papúa Nueva Guinea", "PHP" => "Peso Filipino", "PKR" => "Rupia Pakistaní",
    "PLN" => "Zloty Polaco", "PYG" => "Guaraní Paraguayo", "QAR" => "Rial Catarí", "RON" => "Leu Rumano",
    "RSD" => "Dinar Serbio", "RUB" => "Rublo Ruso", "RWF" => "Franco Ruandés", "SAR" => "Rial Saudí",
    "SBD" => "Dólar de las Salomón", "SCR" => "Rupia de Seychelles", "SDG" => "Libra Sudanesa", "SEK" => "Corona Sueca",
    "SGD" => "Dólar de Singapur", "SHP" => "Libra de Santa Elena", "SLL" => "Leone de Sierra Leona", "SOS" => "Chelín Somalí",
    "SRD" => "Dólar Surinamés", "SSP" => "Libra Sudanesa del Sur", "STN" => "Dobra de Santo Tomé", "SYP" => "Libra Siria",
    "SZL" => "Lilangeni Suazi", "THB" => "Baht Tailandés", "TJS" => "Somoni Tayiko", "TMT" => "Manat Turcomano",
    "TND" => "Dinar Tunecino", "TOP" => "Pa'anga Tongano", "TRY" => "Lira Turca", "TTD" => "Dólar de Trinidad y Tobago",
    "TVD" => "Dólar Tuvaluano", "TWD" => "Nuevo Dólar Taiwanés", "TZS" => "Chelín Tanzano", "UAH" => "Grivna Ucraniana",
    "UGX" => "Chelín Ugandés", "USD" => "Dólar Estadounidense", "UYU" => "Peso Uruguayo", "UZS" => "Som Uzbeco",
    "VES" => "Bolívar Soberano", "VND" => "Dong Vietnamita", "VUV" => "Vatu Vanuatense", "WST" => "Tala Samoano",
    "XAF" => "Franco CFA Central", "XCD" => "Dólar del Caribe Oriental", "XOF" => "Franco CFA Occidental", 
    "XPF" => "Franco CFP", "YER" => "Rial Yemení", "ZAR" => "Rand Sudafricano", "ZMW" => "Kwacha Zambiano"
];

// 2. OBTENER DATOS DE LA API
$api_url = "https://open.er-api.com/v6/latest/EUR";
$json_data = @file_get_contents($api_url);
$response = json_decode($json_data, true);
$tasas = ($response && $response['result'] === 'success') ? $response['rates'] : [];

$resultado_final = "";
$moneda_destino = "";
$cantidad_ingresada = "";

// 3. LÓGICA DE PROCESAMIENTO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidad_ingresada = filter_input(INPUT_POST, 'cantidad', FILTER_VALIDATE_FLOAT);
    $moneda_destino = filter_input(INPUT_POST, 'moneda', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($cantidad_ingresada && isset($tasas[$moneda_destino])) {
        $valor_tasa = $tasas[$moneda_destino];
        $calculo = $cantidad_ingresada * $valor_tasa;
        $resultado_final = number_format($calculo, 2);
    } else {
        $resultado_final = "Error: Datos inválidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChangeIt! | Global Converter</title>
    
    <link rel="icon" type="image/png" href="img/creditoimp.png">
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="card">
        <h1>ChangeIt!</h1>
        <p style="text-align: center; font-size: 0.7rem; color: #ff0000; margin-bottom: 1.5rem; opacity: 0.8; letter-spacing: 1px;">
            SISTEMA CONVERSOR DE DIVISAS
        </p>

        <form method="POST" action="index.php">
            <div class="input-group">
                <label>Euros (EUR):</label>
                <input type="number" name="cantidad" step="0.01" required placeholder="0.00" value="<?php echo htmlspecialchars($cantidad_ingresada); ?>">
            </div>

            <div class="input-group">
                <label>Convertir a:</label>
                <select name="moneda">
                    <?php
                    if (!empty($tasas)) {
                        foreach ($tasas as $codigo => $valor) {
                            $nombre = isset($nombres_monedas[$codigo]) ? $nombres_monedas[$codigo] : $codigo;
                            $selected = ($codigo == $moneda_destino) ? "selected" : "";
                            echo "<option value='$codigo' $selected>$codigo - $nombre</option>";
                        }
                    } else {
                        echo "<option>Error en la API</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit">Ejecutar Conversión</button>
        </form>

        <?php if ($resultado_final !== ""): ?>
            <div class="result-box">
                <?php if (is_numeric(str_replace(',', '', $resultado_final))): ?>
                    <p><?php echo htmlspecialchars($cantidad_ingresada); ?> EUR son:</p>
                    <span><?php echo "$resultado_final $moneda_destino"; ?></span>
                <?php else: ?>
                    <span><?php echo $resultado_final; ?></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
<?php exit; ?>
