<?php 

use yii\helpers\Url;
use common\widgets\Menu;

?> 
  <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                    	<li class="nav-devider"></li>
                        <?=Menu::widget(
	[
			['label' => 'Dashboard', 'level' => 1, 'url' => ['/site/index'], 'icon' => 'mdi mdi-gauge', 'children' => []],
			
			//['label' => 'Announcement', 'level' => 1, 'url' => ['/announcement/index'], 'icon' => 'fa fa-bullhorn', 'children' => []],

			['label' => 'Class Session', 'level' => 1, 'url' => ['class-session/index'], 'icon' => 'fa fa-book', 'children' => []],
			
			['label' => 'Claims', 'level' => 1, 'url' => ['frontend-claim/index'], 'icon' => 'fa fa-list'],
			
			['label' => 'Salaries', 'level' => 1, 'url' => ['frontend-salary/index'], 'icon' => 'fa fa-dollar'],

			['label' => 'Suggestions', 'level' => 1, 'url' => ['/suggestion/index'], 'icon' => 'fa fa-dollar'],

			
			
			

			
		
		]
	
	)?>
                       
                    </ul>
                </nav>