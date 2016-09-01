<!DOCTYPE html>
<html>
<head>
<title>Search Within Table</title>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript">
	$.extend($.expr[":"], {
		"containsIN": function(elem, i, match, array) {
			return (elem.textContent || elem.innerText || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
		}
	});
	$('document').ready(function(){
		$('#stu-search-btn').bind('click',function(){
			var sterm=$('#stu-search').val();
			if(sterm!=''){
				$('td').not(':containsIN('+sterm+')').each(function(index){
					$(this).parent('tr').not(':first-child').css('display','none');
				});
				$('td:containsIN('+sterm+')').each(function(index){
					$(this).parent('tr').css('display','table-row');
				});
			}else{
				$('tr').css('display','table-row');
			}
		});
	});
</script>
</head>
<body>
<table>
<tr>
<td><input type="text" id="stu-search"/></td>
<td><input type="button" id="stu-search-btn" value="Search"/></td>
</tr>
<tr>
<td>Aadesh Suryarao - B.E (EXTC)</td>
<td>Exp : Fresher</td>
</tr>
<tr>
<td>Aakansha Khorjuwekar - B.Sc (I.T)</td>
<td>Exp : L&T Infotech as Software Developer for 27 months</td>
</tr>
<tr>
<td>Aditya Nimbalkar - BMS</td>
<td>Exp : Hapag Lloyd as Co-ordinator for 5 months</td>
</tr>
<tr>
<td>Advait Kulkarni - B.Sc (I.T)</td>
<td>Exp : Fresher</td>
</tr>
<tr>
<td>Ajay Takale - B.E (Electrical)</td>
<td>Exp : L&T as Trainee for 12 months & VACPL as Trainee Engineer for 12 months</td>
</tr>
<tr>
<td>Ajinkya Bhanuwanshe - B.E (Mechnical)</td>
<td>Exp : Fresher</td>
</tr>
</table>
</body>
</html>