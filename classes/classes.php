<?php
class employees{

      public function add_employees($f_name,$l_name,$m_name,$position,$country,$date_b,$home_address,$email_address,$phone_number){
          require_once("connect_mysqli.php");
          require_once("attributes.php");

          $attributes_employees=new attributes_employees();
          
          $attributes_employees->f_name=$f_name;
          $attributes_employees->l_name=$l_name;
          $attributes_employees->l_name=$m_name;
          $attributes_employees->position=$position;
          $attributes_employees->country=$country;
          $attributes_employees->date_b=$date_b;
          $attributes_employees->home_address=$home_address;
          $attributes_employees->email_address=$email_address;
          $attributes_employees->phone_number=$phone_number;
          $date_insert=date("Y-m-d");

          $query_insert_employees=$mysqli->query("INSERT INTO `test_comp`.`employees`
            (`f_name`,
             `l_name`,
             `m_name`,
             `position`,
             `date_e`,
             `country`,
             `home_address`,
             `email_address`,
             `phone_number`,
             `status_e`,
             `date_insert`)
VALUES ('".$attributes_employees->f_name=$f_name."',
        '".$attributes_employees->l_name=$l_name."',
        '".$attributes_employees->l_name=$m_name."',
        '".$attributes_employees->position=$position."',
        '".$attributes_employees->date_b=$date_b."',
        '".$attributes_employees->country=$country."',
        '".$attributes_employees->home_address=$home_address."',
        '".$attributes_employees->email_address=$email_address."',
        '".$attributes_employees->phone_number=$phone_number."',
        '0',
    	'".$date_insert."');");

          if(isset($query_insert_employees)){
          	echo "<h1 style='color:#4578dd;' align='center'>Мы приняли вашу заявку по принятия на работу. Ближайшие время мы свами свяжемся. Спасибо за внимания.</h1>";
          }
      }

      public function list_employees(){
      		require_once("connect_mysqli.php");
      		require_once("attributes.php");
      		$query_select_employees=$mysqli->query("SELECT `id_employees`,`f_name`,`l_name`,`m_name`,`position` FROM `employees` ORDER BY `id_employees` ASC;");
      		$array_select_employees=$query_select_employees->fetch_array();
      		echo "<h1 align='center'>Список всех заявок</h1>";
      		echo "<table align='center' width='600' class='table_employees' border='1'>";
      		echo "<tr><td width='40' align='center'><b>№</b></td><td width='250' align='center'><b>ФИО</b></td><td width='150' align='center'><b>Должность</b></td><td align='center'></td><td align='center'></td></tr>";
      		do{
      			echo "<tr><td align='center'>".$array_select_employees[0]."</td><td>".$array_select_employees[1]." ".$array_select_employees[2]." ".$array_select_employees[3]."</td><td>".$array_select_employees[4]."</td><td><a href='edit_employees.php?emp=".$array_select_employees[0]."'>Редактировать<a></td><td><a href='delete_employees.php?emp=".$array_select_employees[0]."'>Удалить</a></td></tr>";
      		}
      		while($array_select_employees=$query_select_employees->fetch_array());

      		echo "</table><br>";
      }


      public function edit_employees($id_employees){
      		require_once("connect_mysqli.php");
      		require_once("attributes.php");
      		$attributes_employees=new attributes_employees();
      		$attributes_employees->id_employees=$id_employees;

      		$query_all_employees=$mysqli->query("SELECT * FROM `employees` WHERE `id_employees`='".$attributes_employees->id_employees."'");
      		$array_all_employees=$query_all_employees->fetch_array();

      		if(empty($array_all_employees[0])){
      			echo "<h1 style='color:#ff0000;' align='center'>Заявитель не существует!</h1>";
      		}
      		else{
      			echo "<h1 align='center'>Заявитель</h1>";
      			echo '<form class="form_send" action="update_information.php" method="post" name="add_information">
<table border="0" align="center">
<tr>
  <td align="right"><font>Имя:</font></td><td><input type="text" required maxlength="50" value='.$array_all_employees[1].' name="f_name" /></td></tr>
<tr>
  <td align="right"><font>Фамилия:</font></td><td><input type="text" required maxlength="50" value='.$array_all_employees[2].' name="l_name" /></td></tr>
<tr>
  <td align="right"><font>Отчество:</font></td><td><input type="text" maxlength="50" value='.$array_all_employees[3].' name="m_name" /></td></tr>
<tr>
  <td align="right"><font>Должность:</font></td><td><input type="text" required name="position"  maxlength="50" value='.$array_all_employees[4].' /></td></tr>
	<tr>
  <td align="right"><font>Дата рождения:</font></td><td><input type="date" value='.$array_all_employees[5].' min="1920-01-01" max="2000-01-01" required name="date_b" /></td></tr>
<tr>
  <td align="right"><font>Страна:</font></td><td>
<select required class="list_country" name="country">
<option value="'.$array_all_employees[6].'">'.$array_all_employees[6].'</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote DIvoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
</td></tr>

<tr><td align="right"><font>Домашний адрес:</font></td><td><input required type="text" value='.($array_all_employees[7]).' width="100" maxlength="255" name="home_address" /></td></tr>



<tr>
  <td align="right"><font>Email:</font></td><td><input type="email" required placeholder="ivanov@gmail.com" maxlength="50" value='.$array_all_employees[8].' name="email_address" /></td></tr>
	
	<tr>
  <td align="right"><font>Телефон:</font></td><td><input type="number" required placeholder="7953*******" maxlength="15" value='.$array_all_employees[9].' name="phone_number" /></td></tr>

  <tr>
  <td align="right"><font style="font-size:10px;">Принимаем ли мы заявителя на работу:</font></td><td valign="middle"><select name="status_e">';

  if($array_all_employees[10]==1){
  	echo "<option value='1'>Работает</value><option value='0'>Не работает</value>";
  }
  else{
  	echo "<option value='0'>Не работает</value><option value='1'>Работает</value>";
  }

  echo '</select></td></tr>
  <tr><td align="right"><font>Дата заявки:</font></td><td><font style="font-size:15px;">'.$array_all_employees[11].'</font></td></tr>
  

<tr><td valign="bottom" align="center" colspan="2"><br><input class="button" type="submit" value="Редоктировать" name="send" /><input type="hidden" value="'.$array_all_employees[0].'" name="id_employees" /></td></tr>



</table>
</form>';
      		}
      }


      public function update_employees($id_employees,$f_name,$l_name,$m_name,$position,$country,$date_b,$home_address,$email_address,$phone_number,$status_e){
          require_once("connect_mysqli.php");
          require_once("attributes.php");

          $attributes_employees=new attributes_employees();
          
          $attributes_employees->id_employees=$id_employees;
          $attributes_employees->f_name=$f_name;
          $attributes_employees->l_name=$l_name;
          $attributes_employees->m_name=$m_name;
          $attributes_employees->position=$position;
          $attributes_employees->country=$country;
          $attributes_employees->date_b=$date_b;
          $attributes_employees->home_address=$home_address;
          $attributes_employees->email_address=$email_address;
          $attributes_employees->phone_number=$phone_number;
          $attributes_employees->status_e=$status_e;


          $query_all_employees=$mysqli->query("SELECT id_employees FROM `employees` WHERE `id_employees`='".$attributes_employees->id_employees."'");
      		$array_all_employees=$query_all_employees->fetch_array();

      		if(empty($array_all_employees[0])){
      			echo "<h1 style='color:#ff0000;' align='center'>Заявитель не существует!</h1>";
      		}
      		else{

      			$query_insert_employees=$mysqli->query("UPDATE `test_comp`.`employees`
SET 
  `f_name` = '".$attributes_employees->f_name."',
  `l_name` = '".$attributes_employees->l_name."',
  `m_name` = '".$attributes_employees->m_name."',
  `position` = '".$attributes_employees->position."',
  `date_e` = '".$attributes_employees->date_b."',
  `country` = '".$attributes_employees->country."',
  `home_address` = '".$attributes_employees->home_address."',
  `email_address` = '".$attributes_employees->email_address."',
  `phone_number` = '".$attributes_employees->phone_number."',
  `status_e` = '".$attributes_employees->status_e."'
WHERE `id_employees` = '".$attributes_employees->id_employees."';");
      		
      		 if(!empty($query_insert_employees)){
          	echo "<h1 style='color:#4578dd;' align='center'>Информация заявителя ".$attributes_employees->l_name." изменено!</h1>";

      		}

          }
      }



       public function result_search_employees($f_name,$l_name,$m_name,$position,$country,$date_b,$home_address,$email_address,$phone_number,$status_e){
      		require_once("connect_mysqli.php");
      		require_once("attributes.php");

          $attributes_employees=new attributes_employees();
          $attributes_employees->f_name=$f_name;
          $attributes_employees->l_name=$l_name;
          $attributes_employees->m_name=$m_name;
          $attributes_employees->position=$position;
          $attributes_employees->country=$country;
          $attributes_employees->date_b=$date_b;
          $attributes_employees->home_address=$home_address;
          $attributes_employees->email_address=$email_address;
          $attributes_employees->phone_number=$phone_number;
          $attributes_employees->status_e=$status_e;

      		$query_select_employees=$mysqli->query("SELECT `id_employees`,`f_name`,`l_name`,`m_name`,`position` FROM `employees` WHERE `f_name` LIKE('%".$attributes_employees->f_name."%') AND `l_name` LIKE('%".$attributes_employees->l_name."%') AND `m_name` LIKE('%".$attributes_employees->m_name."%') AND `position` LIKE('%".$attributes_employees->position."%') AND `date_e` LIKE('%".$attributes_employees->date_b."%') AND `country` LIKE('%".$attributes_employees->country."%') AND `home_address` LIKE('%".$attributes_employees->home_address."%') AND `email_address` LIKE('%".$attributes_employees->email_address."%') AND `phone_number` LIKE('%".$attributes_employees->phone_number."%') AND `status_e` LIKE('%".$attributes_employees->status_e."%')  ORDER BY `id_employees` ASC;");
      		$array_select_employees=$query_select_employees->fetch_array();


      		echo "<h1 align='center'>Результат поиска</h1>";

      		if(!empty($array_select_employees[0])){

      		echo "<table align='center' width='600' class='table_employees' border='1'>";
      		echo "<tr><td width='40' align='center'><b>№</b></td><td width='250' align='center'><b>ФИО</b></td><td width='150' align='center'><b>Должность</b></td><td align='center'></td><td align='center'></td></tr>";
      		do{
      			echo "<tr><td align='center'>".$array_select_employees[0]."</td><td>".$array_select_employees[1]." ".$array_select_employees[2]." ".$array_select_employees[3]."</td><td>".$array_select_employees[4]."</td><td><a href='edit_employees.php?emp=".$array_select_employees[0]."'>Редактировать<a></td><td><a href='delete_employees.php?emp=".$array_select_employees[0]."'>Удалить</a></td></tr>";
      		}
      		while($array_select_employees=$query_select_employees->fetch_array());

      		echo "</table>";
      	}
      	else{
      		echo "<h1 align='center'>Заявитель не существует!</h1>";
      	}
      }

      public function delete_employees($id_employees){

      		require_once("connect_mysqli.php");
      		require_once("attributes.php");

      		$attributes_employees=new attributes_employees();
      		$attributes_employees->id_employees=$id_employees;

      		$query_check_employees=$mysqli->query("select `id_employees` FROM `employees` WHERE `id_employees` = '".$attributes_employees->id_employees."';");
      		$array_check_employees=$query_check_employees->fetch_array();

      		if(empty($array_check_employees[0])){
      			echo "<h1 align='center'>Заявитель не существует!</h1>";
      		}
      		else{
      			$delete_employees=$mysqli->query("DELETE FROM `test_comp`.`employees` WHERE `id_employees` = '".$attributes_employees->id_employees."';");

      				echo "<h1 align='center'>Заявитель удален!</h1>";
      	}
      		

      }

};

?>