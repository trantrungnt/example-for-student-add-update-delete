<!-- BEGIN: main -->

<table class="tab1">
	<tr>
		<td>DATA.id</td>
		<td>DATA.name</td>
		<td>DATA.age</td>
		<td>DATA.sex</td>
		<td>DATA.classname</td>
		<td>DATA.hobbies</td>
		<td>DATA.description</td>
	</tr>
	<!-- BEGIN: loop -->
	<tbody>
		<tr>
			<td>{DATA.id}</td>
			<td>{DATA.name}</td>
			<td>{DATA.age}</td>
			<td>{DATA.sex}</td>
			<td>{DATA.classname}</td>
			<td>{DATA.hobbies}</td>
			<td>{DATA.description}</td>
			<td><a href="index.php?language=vi&nv=samples&op=main&delid={DATA.id}">Xóa</td>
			<td><a href="index.php?language=vi&nv=samples&op=config&id={DATA.id}">SỬa</td>
		</tr>
	</tbody>
	<!-- END: loop -->

</table>

<!-- END: main -->
