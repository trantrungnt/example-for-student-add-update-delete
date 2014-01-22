<!-- BEGIN: main -->
<form action="{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={MODULE_NAME}&{NV_OP_VARIABLE}={OP}" method="post">
	<input type="hidden" value="{DATA.id}" name="id"/>
	<table witdh = "500">
		<tr>
			<td>Họ và tên111</td>
			<td><input type = "text" name = "txtname"  value="{DATA.name}"/></td>
		</tr>
		<tr>
			<td>Tuổi</td>
			<td><input type = "text" name ="txtage" value="{DATA.age}" /></td>
		</tr>

		<tr>
			<td>Giới tính</td>
			<td><input type="radio" name="sex" value="1"
			<!-- BEGIN: checkedsex1 -->
			checked="checked"
			<!-- END: checkedsex1 -->
			>Nam
			<br/>
			<input type="radio" name="sex" value="0"
			<!-- BEGIN: checkedsex0 -->
			checked="checked"
			<!-- END: checkedsex0 -->
			>Nữ </td>
		</tr>

		<tr>
			<td>Lớp</td>
			<td><input type ="text" name = "txtclassname" value="{DATA.classname}"/></td>
		</tr>

		<tr>
			<td>Sở thích</td>
			<td>
			<select name = "selecthobbies">
				<option value="1" {DATA.selecthobbies1}>Volvo</option>
				<option value="2" {DATA.selecthobbies2}>Saab</option>
				<option value="3" {DATA.selecthobbies3}>Mercedes</option>
				<option value="4" {DATA.selecthobbies4}>Audi</option>
				<option value="5" selected="selected">ABC</option>
			</select></td>
		</tr>

		<tr>
			<td>Mô tả về bản thân</td>
			<td>			<textarea name = "txtareadescription">{DATA.description}</textarea></td>
		</tr>

	</table>

	<div style="text-align: center"><input name="submit" type="submit" value="{LANG.save}" />
	</div>
</form>
<!-- END: main -->
