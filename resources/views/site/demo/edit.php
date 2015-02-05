<?php
$this->layout('site/demo/layout', ['title' => 'Edit User']);

$form = new \AdamWathan\Form\FormBuilder;
$form->bind($user);
?>

<div class="row">

	<div class="col-xs-12">

		<?php if ($success): ?>
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b>Os dados foram gravados com sucesso!</b>
		</div>
		<?php elseif ($errors): ?>
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<b>Por favor corriga os seguintes erros:</b><br>
			<ul>
				<?php foreach($errors as $error): ?>
					<li><?= $error ?></li>
				<?php endforeach ?>
			</ul>
		</div>
		<?php endif; ?>

		<?= $form->open()->post()->action(Html::namedRoute('demo-edit', array('id' => $user->id)))->addClass('form-horizontal')->render(); ?>

		<div>- <i>os campos marcados a <span style="color: red">vermelho</span> são obrigatórios.</i></div>
		<br clear="both" />

		<div class="form-group">
			<div class="col-xs-4">
				<?= $form->label('Email')->addClass('control-label required') ?>
			</div>
			<div class="col-xs-8">
				<?=
				$form->text('email')->name('User[email]')->id('user_email')
					->addClass('form-control input-sm')
				?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-4">
				<?= $form->label('Password')->addClass('control-label required') ?>
			</div>
			<div class="col-xs-8">
				<?=
				$form->text('password')->name('User[password]')->id('user_password')
					->addClass('form-control input-sm')
				?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-4">
				<?= $form->label('Nome')->addClass('control-label required') ?>
			</div>
			<div class="col-xs-8">
				<?=
				$form->text('name')->name('User[name]')->id('user_name')
					->addClass('form-control input-sm')
				?>
			</div>
		</div>

		<div class="col-xs-12" style="float: none; margin: 0 auto;">
			<?= $form->submit('Guardar')->addClass('btn btn-sm btn-primary'); ?>
		</div>

		<?= $form->close() ?>

	</div>

</div>