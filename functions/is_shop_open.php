<?php
	function is_shop_open_now(){
		$todaysDay = current_time('l');
		$theTime = current_time('Hi');
		if ($todaysDay !== "Saturday" && $todaysDay !== "Sunday"){
			
			$openingTime = str_replace(':','',rwmb_meta( 'mon_fri_opening', ['object_type' => 'setting'], 'shop_options' ));
			$closingTime = str_replace(':','',rwmb_meta( 'mon_fri_closing', ['object_type' => 'setting'], 'shop_options' ));
			
			if(($theTime < $closingTime) && ($theTime > $openingTime)){?>
			<p class="highlight d-inline-block">Open now</p>
			<p>Closing at <?php echo date('g:ia',strtotime(rwmb_meta( 'mon_fri_closing', ['object_type' => 'setting'], 'shop_options' )));?></p>

			<?php } elseif($theTime < $openingTime){ ?>

				<p style="color:var(--danger)">Currently closed</p>
				<p>Opening today at <?php echo date('g:ia',strtotime(rwmb_meta( 'mon_fri_opening', ['object_type' => 'setting'], 'shop_options' )));?></p>
			
			<?php } elseif($theTime > $closingTime){?>
			
				<p style="color:var(--danger)">Currently closed</p>
				<p>Opening tomorrow at 
					<?php if($todaysDay == "Friday"){
						echo date('g:ia',strtotime(rwmb_meta( 'sat_opening', ['object_type' => 'setting'], 'shop_options' )));
					} else {
						echo date('g:ia',strtotime(rwmb_meta( 'mon_fri_opening', ['object_type' => 'setting'], 'shop_options' )));
					} ?>
				</p>		

			<?php }
			
		} elseif($todaysDay == "Saturday" && $todaysDay !== "Sunday"){

			$openingTime = str_replace(':','',rwmb_meta( 'sat_opening', ['object_type' => 'setting'], 'shop_options' ));
			$closingTime = str_replace(':','',rwmb_meta( 'sat_closing', ['object_type' => 'setting'], 'shop_options' ));
			
			if(($theTime < $closingTime) && ($theTime > $openingTime)){?>
			<p class="highlight d-inline-block">Open now</p>
			<p>Closing at <?php echo date('g:ia',strtotime(rwmb_meta( 'sat_closing', ['object_type' => 'setting'], 'shop_options' )));?></p>

			<?php } elseif($theTime < $openingTime){ ?>

				<p style="color:var(--danger)">Currently closed</p>
				<p>Opening today at <?php echo date('g:ia',strtotime(rwmb_meta( 'sat_opening', ['object_type' => 'setting'], 'shop_options' )));?></p>
			
			<?php } elseif($theTime > $closingTime){?>
			
				<p style="color:var(--danger)">Currently closed</p>
				<p>Opening tomorrow at 
					<?php echo date('g:ia',strtotime(rwmb_meta( 'sun_opening', ['object_type' => 'setting'], 'shop_options' )));?>
				</p>		

			<?php }
			 elseif($todaysDay == "Sunday"){

			$openingTime = str_replace(':','',rwmb_meta( 'sun_opening', ['object_type' => 'setting'], 'shop_options' ));
			$closingTime = str_replace(':','',rwmb_meta( 'sun_closing', ['object_type' => 'setting'], 'shop_options' ));
			
			if(($theTime < $closingTime) && ($theTime > $openingTime)){?>
			<p class="highlight d-inline-block">Open now</p>
			<p>Closing at <?php echo date('g:ia',strtotime(rwmb_meta( 'sun_closing', ['object_type' => 'setting'], 'shop_options' )));?></p>

			<?php } elseif($theTime < $openingTime){ ?>

				<p style="color:var(--danger)">Currently closed</p>
				<p>Opening today at <?php echo date('g:ia',strtotime(rwmb_meta( 'sun_opening', ['object_type' => 'setting'], 'shop_options' )));?></p>
			
			<?php } elseif($theTime > $closingTime){?>
			
				<p style="color:var(--danger)">Currently closed</p>
				<p>Opening tomorrow at 
					<?php echo date('g:ia',strtotime(rwmb_meta( 'mon_fri_opening', ['object_type' => 'setting'], 'shop_options' )));?>
				</p>		

			<?php }
			
		};
	}
		
	}