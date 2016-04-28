<div class="box">
	<div class="box-body">
		<table id="tblEmpresas" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Razón Social</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td>{$row.idEmpresa}</td>
						<td>{$row.razonsocial}</td>
						<td style="text-align: right">
							<a href="usuariosAdmon/{$row.idEmpresa}" class="btn btn-default"><i class="fa fa-users"></i></a>

							<button type="button" class="btn btn-default" action="modificar" title="Modificar" datos='{$row.json}'><i class="fa fa-pencil"></i></button>
							<button type="button" class="btn btn-danger" action="eliminar" title="Eliminar" empresa="{$row.idEmpresa}"><i class="fa fa-times"></i></button>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>