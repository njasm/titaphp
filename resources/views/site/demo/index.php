<?php $this->layout('site/demo/layout', ['title' => 'Users List']) ?>

<?php
try {
	\Jupitern\Datatables\Datatables::instance('dt_example')
		->setData($users)
		->jsParam('columnDefs', '[{ "targets": 4, "orderable": false }]')
		->attr('class', 'table table-bordered table-striped table-hover')
		->attr('cellspacing', '0')
		->attr('width', '100%')
		->column('ID')
			->value('id')
			->css('color', '#888')
			->css('width', '10%')
			->css('background-color', '#efefef')
			->css('background-color', '#f5f5f5', true)
		->add()
		->column('Name')
			->value('name')
			->filter()
			->css('color', '#778899')
			->css('width', '25%')
		->add()
		->column('email')
			->value('email')
			->filter()
			->css('color', '#DEB887')
			->css('width', '25%')
		->add()
		->column('Created At')
			->value(function ($row) { return I18n::date($row->created_at); })
			->css('width', '30%')
		->add()
		->column('')
			->value(function ($row) {
				return
					'<a href="'. Html::namedRoute('demo-edit', ['id' => $row->id]) .'">edit</a>&nbsp;'.
					'<a href="'. Html::namedRoute('demo-delete', ['id' => $row->id]) .'">delete</a>';
			})
			->css('width', '10%')
		->add()
		->render();
}
catch (PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}
?>