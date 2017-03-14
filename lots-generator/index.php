<!DOCTYPE html>
<html>
	<head>
		<title>
			Lots Generator
		</title>
	</head>
	<body>
		<form>
			Max no. of teams in a pool: <input type="number" name="max-teams" min="2">
			<input type="submit" name="generate" value="Generate">
		</form>
		<?php
			if(isset($_GET['generate'])){
				$teams = ['t1','t2','t3','t4','t5','t6','t7','t8','t9','t10','t11','t12','t13','t14','t15'];
				$tempTeams = ['t1','t2','t3','t4','t5','t6','t7','t8','t9','t10','t11','t12','t13','t14','t15'];
				$pools = [];
				$max_teams_in_pool = $_GET['max-teams'];
				$pool_count = (int)(count($teams)/$max_teams_in_pool);
				foreach($teams as $k => $v){
					echo $v.' ';
				}
				for($i = 0; $i < $pool_count; $i++){
					for($j = 0; $j < $max_teams_in_pool; $j++){
						$randomKey = array_rand($tempTeams);
						$pools[$i][] = $tempTeams[$randomKey];
						unset($tempTeams[$randomKey]);
					}
				}
				$remainingTeams = $teams;
				foreach($pools as $k => $v){
					$remainingTeams = array_diff($remainingTeams,$v);
				}
				if($remainingTeams){
					$pools[] = $remainingTeams;
				}
				echo "<br/>Max teams in a pool: ".$max_teams_in_pool;
				echo "<br/>Number of pools: ".$pool_count;
				echo "<br/>Number of teams not allotted: ".(count($teams) - ($max_teams_in_pool*$pool_count));
				// echo "<pre>";print_r($remainingTeams);
				echo "<pre>";print_r($pools);exit;
			}
		?>
	</body>
</html>