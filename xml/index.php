<html>
<?php 
if(isset($_POST['submit']) && isset($_POST['xmlstring'])){
	$output = $_POST['xmlstring'];
	echo "Original string : <pre>".$output."</pre>";
	$xml = simplexml_load_string($output,null,null,"http://schemas.xmlsoap.org/soap/envelope/");
	echo "Loaded string : <pre>";print_r($xml);echo "</pre>";
}
?>
	<body>
		<form method="post">
			XML string : <input type="text" name="xmlstring"/>
			<input type="submit" value="Submit" name="submit"/>
		</form>
	</body>
</html>
<pre><?xml version="1.0" encoding="utf-8"?><soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema"><soap:Body><CreateBookingResponse xmlns="http://tempuri.org/"><CreateBookingResult><xs:schema id="NewDataSet" xmlns="" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:msdata="urn:schemas-microsoft-com:xml-msdata"><xs:element name="NewDataSet" msdata:IsDataSet="true" msdata:UseCurrentLocale="true"><xs:complexType><xs:choice minOccurs="0" maxOccurs="unbounded"><xs:element name="Table"><xs:complexType><xs:sequence><xs:element name="ID" type="xs:int" minOccurs="0" /><xs:element name="CallID" type="xs:string" minOccurs="0" /><xs:element name="SerialNo" type="xs:string" minOccurs="0" /><xs:element name="CALLTAKENAT" type="xs:dateTime" minOccurs="0" /><xs:element name="CallerNo" type="xs:string" minOccurs="0" /><xs:element name="CallerName" type="xs:string" minOccurs="0" /><xs:element name="GUESTNAME" type="xs:string" minOccurs="0" /><xs:element name="PickupDateTime" type="xs:dateTime" minOccurs="0" /><xs:element name="PickupAddress" type="xs:string" minOccurs="0" /><xs:element name="DestAddress" type="xs:string" minOccurs="0" /><xs:element name="VehicleNo" type="xs:string" minOccurs="0" /><xs:element name="DRIVERNAME" type="xs:string" minOccurs="0" /><xs:element name="DRIVERMOBILENO" type="xs:string" minOccurs="0" /><xs:element name="JrnyStartTime" type="xs:dateTime" minOccurs="0" /><xs:element name="JrnyEndTime" type="xs:dateTime" minOccurs="0" /><xs:element name="CancelledBy" type="xs:string" minOccurs="0" /><xs:element name="CancelledOn" type="xs:dateTime" minOccurs="0" /><xs:element name="TripStatus" type="xs:string" minOccurs="0" /><xs:element name="PickUpPoint" type="xs:string" minOccurs="0" /></xs:sequence></xs:complexType></xs:element></xs:choice></xs:complexType></xs:element></xs:schema><diffgr:diffgram xmlns:msdata="urn:schemas-microsoft-com:xml-msdata" xmlns:diffgr="urn:schemas-microsoft-com:xml-diffgram-v1"><NewDataSet xmlns=""><Table diffgr:id="Table1" msdata:rowOrder="0"><ID>1</ID><CallID>22Dec2015172208977308</CallID><SerialNo>M122200373</SerialNo><CALLTAKENAT>2015-12-22T17:22:08.98+05:30</CALLTAKENAT><CallerNo>9404469443</CallerNo><CallerName>NEWUSER</CallerName><GUESTNAME>NEWUSER</GUESTNAME><PickupDateTime>2015-12-22T17:29:16+05:30</PickupDateTime><PickupAddress>12, Station Rd, Valmiki Nagar, Thane East, Thane, Maharashtra 400603, India</PickupAddress><DestAddress>Viviana Mall, Eastern Express Hwy, Laxmi Nagar, Thane West, Thane, Maharashtra 400606, India</DestAddress><TripStatus>Pending</TripStatus><PickUpPoint>19.1840249,72.9802325</PickUpPoint></Table></NewDataSet></diffgr:diffgram></CreateBookingResult><Status>OK</Status><Msg /></CreateBookingResponse></soap:Body></soap:Envelope>
</pre>