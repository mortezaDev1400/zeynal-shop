<?php
						$wtype_post_radio = get_post_meta(get_the_ID(), 'wtype_post_radio', true);
						$special_image_address_wtype = get_post_meta(get_the_ID(), 'special_image_address_wtype', true);
						?>
						<?php 						
							switch ($wtype_post_radio)
							{
							case "special_image_wtype":
							  echo '<div ><img src='.$special_image_address_wtype .' title="image" alt="image" ></div>';
							  break;
							case "android_wtype":
							  echo "<div class='wtype-radio'><i class='fa fa-android'></i><span>ANDROID</span></div>";
							  break;
							case "ios_wtype":
							  echo "<div class='wtype-radio'><i class='fa fa-ios'></i><span>IOS</span></div>";
							  break;
							case "windows_wtype":
							  echo "<div class='wtype-radio'><i class='fa fa-windows'></i><span>WINDOWS</span></div>";
							  break;
							case "linux_wtype":
							  echo "<div class='wtype-radio'><i class='fa fa-linux'></i><span>LINUX</span></div>";
							  break;
							case "macintash_wtype":
							  echo "<div class='wtype-radio'><i class='fa fa-apple'></i><span>MACINTOSH</span></div>";
							  break;
							case "music_wtype":
							  echo "<div class='wtype-radio'><i class='fa fa-music'></i><span>MUSIC</span></div>";
							  break;
							case "film_wtype":
							  echo "<div class='wtype-radio'><i class='fa fa-film'></i><span>FILM</span></div>";
							  break;
							case "pcomputer_wtype":
							  echo "<div class='wtype-radio'><i class='fa fa-desktop'></i><span>PC</span></div>";
							  break;
							case "mobile_wtype":
							  echo "<div class='wtype-radio'><i class='fa fa-mobile'></i><span>MOBILE</span></div>";
							  break;
							case "news_wtype":
							  echo "<div class='wtype-radio'><i class='fa fa-newspaper-o'></i><span>NEWS</span></div>";
							  break;
						  
							default:
							  echo "<div class='wtype-radio'><i class='fa fa-download'></i><span>DOWNLOAD</span></div>";
							}										
						?>