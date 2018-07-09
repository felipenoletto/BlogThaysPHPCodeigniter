$(document).ready(function(){
	$(".data-table").dataTable({
		"oLanguage": {
			"sSearch": "Pesquisar:",
			"sZeroRecords": "Nenhum dado encontrado",
			"sInfoEmpty": "Nenhum registro pra ser exibido",
			"sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros"
		},
		"sScrollY": "400px",
		"sScrollX": "100%",
		"sScrollXInner": "100%",
		"bPaginate": false,
		/*"aaSorting": [[0, "asc"]],*/
		"bSort": false,
	});
	$(".dataTables_filter").addClass('row');
	$(".dataTables_filter label").first().focus().addClass('four columns');
});
