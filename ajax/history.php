<style>
    table.rounded-corners {
 /* Change these properties */
 --border: 0px solid black;
 border-radius: 10px;

 /* Don't change these properties */
 border-spacing: 0;
 border-collapse: separate;
 border: var(--border);
 overflow: hidden;
}

/* Apply a border to the right of all but the last column */
table.rounded-corners th:not(:last-child),
table.rounded-corners td:not(:last-child) {
 border-right: var(--border);
}

/* Apply a border to the bottom of all but the last row */
table.rounded-corners>thead>tr:not(:last-child)>th,
table.rounded-corners>thead>tr:not(:last-child)>td,
table.rounded-corners>tbody>tr:not(:last-child)>th,
table.rounded-corners>tbody>tr:not(:last-child)>td,
table.rounded-corners>tfoot>tr:not(:last-child)>th,
table.rounded-corners>tfoot>tr:not(:last-child)>td,
table.rounded-corners>tr:not(:last-child)>td,
table.rounded-corners>tr:not(:last-child)>th,
table.rounded-corners>thead:not(:last-child),
table.rounded-corners>tbody:not(:last-child),
table.rounded-corners>tfoot:not(:last-child) {
 border-bottom: var(--border);
}
</style>
<table class="table table-bordered blueTable rounded-corners">
	<thead>
		<tr bgcolor="4682B4" style="color:white">
		  <th scope="col" style="text-align: center;">STT</th>
		  <th scope="col" style="text-align: center;">Tên</th>
		  <th scope="col" style="text-align: center;">Mệnh Giá</th>
		  <th scope="col" style="text-align: center;">Thẻ</th>
		  <th scope="col" style="text-align: center;">Trạng Thái</th>
		  <th scope="col" style="text-align: center;">Thời Gian </th>
		</tr>
	</thead>  
  <?php 
include("../api/config.php");

$query = $conn->query("SELECT * FROM `trans_log` ORDER BY `id` DESC LIMIT 10");
if($query->num_rows > 0){ 
    while($row = $query->fetch_array()){
	    if ($row['status'] == 1){
			$status = '<span class="badge badge-success" style="font-size:100%;color:white;">Thành Công</span>';
	    } else if ($row['status'] == 2){
			$status = '<span class="badge badge-danger" style="font-size:100%;color:white;">Thất Bại</span>';
		} else if ($row['status'] == 3){
			$status = '<span class="badge badge-info" style="font-size:100%;color:white;">Sai Mệnh Giá</span>';
		} else {
		    $status = '<span class="badge badge-info" style="font-size:100%;color:white;">Chờ Duyệt</span>';
		}
		echo '
	    <tbody>
			<td style="text-align: center;">'.$row['id'].'</td>
			<td style="text-align: center;">'.$row['name'].'</td>
			<td style="text-align: center;">'.number_format($row['amount']).'đ</td>
			<td style="text-align: center;">'.$row['type'].'</td>
			<td style="text-align: center;">'.$status.'</td>
			<td>'.$row['date'].'</td>
		</tbody>
		';
	}
} else {
	echo '
	<tbody>
		<td colspan="6" align="center"><span class="btn btn-success" style="font-size:100%;color:white;"><< Lịch Sử Trống >></span></td>
	</tbody>
	';
}
  ?>
  
		</table>
