<?php
function can_access_menu($menu){
    if($_SESSION['apriori_sitama_level']==2 & ($menu=='hasil_split' || $menu=='view_rule' || $menu=='hasiluser' || $menu=='akun_split' || $menu=='akun_user')){
        return true;
    }
    if($_SESSION['apriori_sitama_level']==1){
        return true;
    }
    return false;
}
function text_with_list_users($label='', $name='', $value='', $required=false, $all=false, $text_all='-',$where='', $params='')
{
    label($label);
    list_users($name, $value, $required, $all, $text_all, $where, $params);
}
function list_users($name, $selected_id='', $required=false, $all=false, $text_all='-', $where='', $params=''){
        $db_obj = new database();
        
	$table = TB_PREF."users";
        $query = $db_obj->display_table_all_column($table, $where, false, false, 0, 0, 'nama');
	echo "<select name='$name' "; if($required) echo "required='required'"; echo " class='form-control' ".$params." >";
        if($all){                
            echo "<option value=''> $text_all </option>";
        }
	
        //loop data
        while($myrow = $db_obj->db_fetch_array($query)){	
            echo "<option value='".$myrow['id']."' "; if($selected_id==$myrow['id']) echo "selected='selected'";
            echo ">".$myrow['user_id']." -> ".$myrow['nama']."</option>";		
        }
	echo "</select>";
}
function text_with_list_levels($label='', $name='', $value='', $required=false, $all=false, $text_all='-',$where='', $params='')
{
    label($label);
    list_levels($name, $value, $required, $all, $text_all, $where, $params);
}
function list_levels($name, $selected_id='', $required=false, $all=false, $text_all='-', $where='', $params=''){
        
	echo "<select name='$name' "; if($required) echo "required='required'"; echo " class='form-control' $params >";
        if($all){                
            echo "<option value=''> $text_all </option>";
        }
	
        echo "<option value='1' ";
            if($selected_id=="1") echo "selected='selected' >Admin</option>";
        echo "<option value='2' ";
            if($selected_id=="2") echo "selected='selected' >User Store</option>";
            
	echo "</select>";
}
function list_periode($name, $selected_id='', $required=false, $all=false, $text_all='-', $where='', $params=''){
        $db_obj = new database();
        
    $table = "periode";
        $query = $db_obj->display_table_all_column($table, $where, false, false, 0, 0, 'id_periode');
    echo "<select name='$name' "; if($required) echo "required='required'"; echo " class='form-control' ".$params." >";
        if($all){                
            echo "<option value=''> $text_all </option>";
        }
    
        //loop data
        while($myrow = $db_obj->db_fetch_array($query)){    
            echo "<option value='".$myrow['id_periode']."' "; if($selected_id==$myrow['id_periode']) echo "selected='selected'";
            echo ">".$myrow['semester']." - ".$myrow['tahun']."</option>";       
        }
    echo "</select>";
}

function list_transaction($name, $selected_id='', $required=false, $all=false, $text_all='-', $where='', $params=''){
        $db_obj = new database();
        
    $table = "transaction";
        $query = $db_obj->display_table_all_column($table, $where, false, false, 0, 0, 'id_mk');
    echo "<select name='$name' "; if($required) echo "required='required'"; echo " class='form-control' ".$params." >";
        if($all){                
            echo "<option value=''> $text_all </option>";
        }
    
        //loop data
        while($myrow = $db_obj->db_fetch_array($query)){    
            echo "<option value='".$myrow['id_mk']."' "; if($selected_id==$myrow['id_mk']) echo "selected='selected'";
            echo ">".$myrow['n_mk']."</option>";       
        }
    echo "</select>";
}


function list_adminis($name, $selected_id='', $required=false, $all=false, $text_all='-', $where='', $params=''){
        $db_obj = new database();
        
    $table = "adminis";
        $query = $db_obj->display_table_all_column($table, $where, false, false, 0, 0, 'id_adminis');
    echo "<select name='$name' "; if($required) echo "required='required'"; echo " class='form-control' ".$params." >";
        if($all){                
            echo "<option value=''> $text_all </option>";
        }
    
        //loop data
        while($myrow = $db_obj->db_fetch_array($query)){    
            echo "<option value='".$myrow['id_adminis']."' "; if($selected_id==$myrow['id_adminis']) echo "selected='selected'";
            echo ">".$myrow['nama']."</option>";       
        }
    echo "</select>";
}


function list_bulan($selected_id){
	echo "<select name='bulan' class='err'>";
	echo "	<option value=''>--Bulan--</option>";
	echo "	<option value='01' "; if($selected_id=='01') echo "selected='selected'"; echo ">Januari</option>";
	echo "	<option value='02' "; if($selected_id=='02') echo "selected='selected'"; echo ">Februari</option>";
	echo "	<option value='03' "; if($selected_id=='03') echo "selected='selected'"; echo ">Maret</option>";
	echo "	<option value='04' "; if($selected_id=='04') echo "selected='selected'"; echo ">April</option>";
	echo "	<option value='05' "; if($selected_id=='05') echo "selected='selected'"; echo ">Mei</option>";
	echo "	<option value='06' "; if($selected_id=='06') echo "selected='selected'"; echo ">Juni</option>";
	echo "	<option value='07' "; if($selected_id=='07') echo "selected='selected'"; echo ">Juli</option>";
	echo "	<option value='08' "; if($selected_id=='08') echo "selected='selected'"; echo ">Agustus</option>";
	echo "	<option value='09' "; if($selected_id=='09') echo "selected='selected'"; echo ">September</option>";
	echo "	<option value='10' "; if($selected_id=='10') echo "selected='selected'"; echo ">Oktober</option>";
	echo "	<option value='11' "; if($selected_id=='11') echo "selected='selected'"; echo ">November</option>";
	echo "	<option value='12' "; if($selected_id=='12') echo "selected='selected'"; echo ">Desember</option>";	
	echo "</select>";
}

function list_numbers($name, $selected_id='', $required=false, $all=false, $text_all='-', $count=5, $params=''){
        
	echo "<select name='$name' "; 
            echo ($required==true)?"required='required'":""; 
            echo "$params style='width: 100%;'>";
        if($all){                
            echo "<option value=''> $text_all </option>";
        }
        $no = 1;
        while($no <= $count){
            echo "<option value='".$no."' "; 
            echo ($selected_id==$no)?"selected='selected'":"";
            echo ">".$no."</option>";	
            $no++;
        }
	echo "</select>";
}
function phpAlert($msg){
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
function display_error($msg){
    echo "<div class='alert alert-danger alert-dismissable'>
            
            <h4><i class='icon fa fa-ban'></i> Error! </h4>
            ".$msg."
        </div>";
}
function display_warning($msg){
    echo "<div class='alert alert-warning alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4><i class='icon fa fa-warning'></i> Warning! </h4>
            ".$msg."
          </div>";
}
function display_information($msg){
    echo "<div class='alert alert-info alert-dismissable'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
            <h4><i class='icon fa fa-info'></i> Information </h4>
            ".$msg."
          </div>";
}
function display_success($msg){
    echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Success. </h4>
                    ".$msg."
                  </div>";
}
function br($a=1){
	if($a>=1){
		$aa=0;
		while($aa<=$a){
			echo "<br>";
			$aa++;
		}
	}
}

function space($a=1){
	if($a>=1){
		$aa=0;
		while($aa<=$a){
			echo "&nbsp;";
			$aa++;
		}
	}
}
function start_div($params=''){
	echo "<div $params>";
}
function end_div(){
	echo "</div>";
}
function start_form($params=''){
	echo "<form action='' method='post' $params>";
}
function end_form(){
	echo "</form>";
}
function start_table($params=''){
	echo "<table $params>";
}
function end_table(){
	echo "</table>";
}
function start_row($params=''){
	echo "<tr $params>";
}
function end_row(){
	echo "</tr>";
}
function start_column($params=''){
	echo "<td $params>";
}
function end_column(){
	echo "</td>";
}
function label($label='', $params=''){
	echo "<label for='name' $params >".$label;//.<!-- <span class="red">(required)</span> --></label>"
	echo "</label>";
}
function input_text_area($name,$value, $required=false, $params='', $texteditor=false){
    $tinymce = "mceNoEditor";
    if($texteditor){
        $tinymce = "mceEditor";
    }
    if(!$required){
        echo "<textarea name='$name' rows='10' cols='80' $params>".$value."</textarea>";
    }
    else{
        echo "<textarea name='$name' required='required' class='form-control $tinymce' $params>".$value."</textarea>";
    }
}

function text_area($label='', $name='', $value=null, $required=false, $params='', $texteditor=false)
{
	label($label);
	input_text_area($name, $value, $required, $params, $texteditor);
}
function password_field($label='', $name='', $value='', $required=false, $params='')
{
	label($label);
	input_password_text($name, $value, $required, $params);
}
function text_field($label='', $name='', $value='', $required=false, $params='')
{
	label($label);
	input_free_text($name, $value, $required, $params);
}
function text_input_file($label='', $name='', $required=false, $params=''){
    label($label);
    input_file($name, $required, $params );
}
function amount_field($label='', $name='', $value='', $required=false, $params='')
{
	label($label);
	input_amount_text($name, $value, $required, $params);
}

function text_label_with_hidden($label='', $name='', $id_value='', $value=null, $params='')
{
	label($label);
    space(2);
    echo $value;
    input_hidden($name, $id_value, $params);
}
function text_cell($text='', $params='')
{
	start_column($params);
	echo $text;
	end_column();
}
function space_cell($params='')
{
	start_column($params);
	echo "&nbsp;";
	end_column();
}
function head_table($head, $thead=false){
    if($thead){
        echo "<thead>";
    }
	start_row();
	foreach ($head as $val => $value) {
		echo "<th>".$value."</th>";
	}
	end_row();
    if($thead){
        echo "</thead>";
    }
}
function foot_table($head, $thead=false){
    if($thead){
        echo "<tfoot>";
    }
	start_row();
	foreach ($head as $val => $value) {
		echo "<th>".$value."</th>";
	}
	end_row();
    if($thead){
        echo "</tfoot>";
    }
}
function edit_delete_link($table, $id, $parameter_key, $path_to_root, $parent_menu){
	start_column("align='center' ");
        edit_link($table, $id, $parameter_key, $path_to_root, $parent_menu);
//	echo " | ";
        delete_link($table, $id, $parameter_key, $path_to_root, $parent_menu);
	end_column();
}
function edit_link($table, $id, $parameter_key, $path_to_root, $parent_menu){
    echo "<a href='?".$parameter_key."kd_tabel=$table&headmenu=$parent_menu&update=$id' class='btn bg-olive btn-sm margin' data-toggle='tooltip' title='Edit' >"
            . "<i class='glyphicon glyphicon-edit' ></i>"
            . "</a>";
}
function delete_link($table, $id, $parameter_key, $path_to_root, $parent_menu, $params=''){
    $prm='';
    if(!empty($params)){
        $prm = "&".$params;
    }
    echo "<a href='?".$parameter_key."kd_tabel=$table&headmenu=$parent_menu&delete=".$id.$prm."' onclick=\"return confirm('Apakah anda yakin?')\" class='btn btn-danger btn-sm' data-toggle='tooltip' title='Delete'>"
            . "<i class='glyphicon glyphicon-remove-sign' ></i>"
            . "</a> ";
}
function colom_link_text($link, $label, $params=''){
        start_column("align='center' ");
        link_text($link, $label, $params);
	end_column();
}
function input_password_text($name,$value, $required=true, $params=''){
	
	if(!$required){
		echo "<input type='password'  name='$name' 
			value='$value' class='form-control' $params/>";
	}
	else{
		echo "<input type='password' name='$name' 
			value='$value' required='required' class='form-control' $params/>";
	}
}
function input_free_text($name,$value, $required=true, $params=''){
	
	if(!$required){
		echo "<input type='text'  name='$name' 
			value='$value' class='form-control' $params/>";
	}
	else{
		echo "<input type='text' name='$name' 
			value='$value' required='required' class='form-control' $params/>";
	}
}
function input_file($name, $required=false, $params=''){
    if(!$required){
        echo "<input type='file' name='$name' $params>";
    }
    else{
        echo "<input type='file' name='$name' required='required' $params>";
    }
}
function input_amount_text($name,$value, $required=true, $params=''){
	
        $value = price_format($value);
	if(!$required){
		echo "<input type='text'  name='$name' 
			value='$value' onkeyup=\"convertToPrice(this);\" class='form-control' $params/>";
	}
	else{
		echo "<input type='text' name='$name' 
			value='$value' onkeyup=\"convertToPrice(this);\" required='required' class='form-control' $params/>";
	}
}
function input_hidden($name, $value, $params=''){
	echo "<input type='hidden' id='$name' name='$name' value='$value' $params/>";
}
function input_date($name, $value, $tittle='', $id='date-picker'){
	echo "<input type='text' id='$id'  name='$name' size='10' maxlength='10' 
			value='$value' tittle ='$tittle' />";	
}
function submit_form_button($name, $value){
	echo "<input type='submit' name='$name' value='$value' >";
	echo "<input type='reset' value='Reset'>";
}
function submit_button($name, $value, $params=''){
	echo "<button name='$name' value='$value' $params >$value</button>";
	// echo "<input type='submit' name='$name' value='$value' >";
}

function link_new_window($label, $link){
	echo  "<a href='$link' target='_blank' onclick=\"window.open(this.href); return false;\" 
	 onkeypress=\"window.open(this.href); return false;\">$label</a>";
}
function link_text($link, $label, $params='')
{
	echo "<a href='$link' $params />$label</a>";
}

function price_format($value){
	return number_format($value,2, ',', '.');
}
function print_cetak(){
    echo "<a href=\"javascript:window.print()\">Cetak</a>";
}

function format_date($date){
    $date_ex = explode("/", $date);
    return $date_ex[2]."-".$date_ex[1]."-".$date_ex[0];
}

function format_date2($date){
    $date_ex = explode("-", $date);
    return $date_ex[2]."/".$date_ex[1]."/".$date_ex[0];
}

function format_date_db($date){
    $date_ex = explode("-", $date);
    return $date_ex[2]."-".$date_ex[1]."-".$date_ex[0];
}

?>