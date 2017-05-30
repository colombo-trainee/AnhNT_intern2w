<?php 
namespace App\functionNTA;
 ?>
<?php 
	function subMenu($data,$id)
	{
		echo '<ul>';
		foreach ($data as $item) {
			if ($item['parent_id'] == $id) {
				echo '<li><a href="the-loai/'.$item["id"].'/'.$item["slug_name"].')">'.$item["name"].'</a>';
				subMenu($data,$item['id']);
				echo '</li>';
			}
			
		}
		echo '</ul>';

	}

 ?>