				$i=0;
				$result = mysql_query("SELECT id_calendar, title, content_short, image, date_start FROM calendar WHERE active= 1 ORDER BY date_start DESC");
				while ($row = mysql_fetch_array($result)) 
				{
					$tab[0][$i]="$row[0]";
					$tab[1][$i]="$row[1]";
					$tab[2][$i]="$row[2]";
					$tab[3][$i]="$row[3]";
					$tab[czas][$i]="$row[4]";
					$tab[tabela][$i]='c';
					$i++;
				}
				$result = mysql_query("SELECT blog_id, title, short_content, image, date FROM blog WHERE active= 1 ORDER BY date DESC");
				while ($row = mysql_fetch_array($result)) 
				{
					$tab[0][$i]="$row[0]";
					$tab[1][$i]="$row[1]";
					$tab[2][$i]="$row[2]";
					$tab[3][$i]="$row[3]";
					$tab[czas][$i]="$row[4]";
					$tab[tabela][$i]='b';
					$i++;
				}
				$koniec=0;
				while ($koniec<$i) 
				{
					if(!empty($tab[3][$koniec]))
						{
							$image=$tab[0][$koniec].'/'.$tab[3][$koniec];
						}  
						else 
						{
							$image='default.jpg';
						}
					if($tab[tabela][$koniec]=='c') {$cat='../calendar/'; $gdzie_zdj='calendar_images';}
					if($tab[tabela][$koniec]=='b') {$cat='../blog/'; $gdzie_zdj='images';}
					echo'
					<article class="article">
						<div class="article__wrapp-image">
							<img src="../'.$gdzie_zdj.'/'.$image.'" alt="" class="article__image">
						</div>
						<header class="article__header-wapper">
							<h1 class="article__header">'.$tab[1][$koniec].'</h1>
						</header>
						<p class="article__text">'.$tab[2][$koniec].'</p>
						<button class="article__button" onclick="window.location.href = \''.$cat.'?id='.$tab[0][$koniec].'\';">Czytaj wiecej ></button>
					</article>';
					$koniec++;
				}
