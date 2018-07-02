<?php
/**
 * Created by IntelliJ IDEA.
 * User: shahi
 * Date: 2/1/2018
 * Time: 4:45 PM
 */

$student = isset($student) && is_array($student) ? $student : [];
?>
<article class="container registration">
	<div class="row">
		<h3 class="col-md-offset-1 col-md-10">Նոր ուսանող</h3>
	</div>
	<div class="row">
		<form class="col-md-offset-1 col-md-10" method="post" action="/students/<?= empty($student) ? 'add' : 'edit/' . $student['id'] ?>">
			<div class="form-group col-md-4">
				<label for="name">Անուն</label>
				<input type="text" id="name" value="<?= !empty($student['name']) ? $student['name'] : '' ?>" class="form-control" name="name" placeholder="Անուն" required>
			</div>
			<div class="form-group col-md-4">
				<label for="surname">Ազգանուն</label>
				<input type="text" id="surname" value="<?= !empty($student['surname']) ? $student['surname'] : '' ?>" class="form-control" name="surname" placeholder="Ազգանուն" required>
			</div>
			<div class="form-group col-md-4">
				<label for="middlename">Հայրանուն</label>
				<input type="text" id="middlename" value="<?= !empty($student['middlename']) ? $student['middlename'] : '' ?>" class="form-control" name="middlename" placeholder="Հայրանուն" required>
			</div>

			<div class="form-group col-md-4">
				<label for="birthDate">Ծննդյան ամսաթիվ</label>
				<input type="date" id="birthDate" value="<?= !empty($student['birthDate']) ? $student['birthDate'] : '' ?>" class="form-control" name="birthDate" placeholder="Ծննդյան ամսաթիվ" required>
			</div>
			<div class="form-group col-md-4">
				<label for="registrationDate">Գրանցման ամսաթիվ</label>
				<input type="date" id="registrationDate" value="<?= !empty($student['registrationDate']) ? $student['registrationDate'] : '' ?>" class="form-control" name="registrationDate" placeholder="Գրանցման ամսաթիվ" required>
			</div>
			<div class="form-group col-md-4">
				<label for="cash">Գումար</label>
				<input type="number" id="cash" value="<?= !empty($student['cash']) ? $student['cash'] : '' ?>" class="form-control" name="cash" placeholder="Գումար" required>
			</div>

			<div class="form-group col-md-4">
				<label for="passport">Անձնագիր</label>
				<input type="text" id="passport" value="<?= !empty($student['passport']) ? $student['passport'] : '' ?>" class="form-control" name="passport" placeholder="Անձնագիր">
			</div>
			<div class="form-group col-md-4">
				<label for="passportDate">Տրման ամսաթիվ</label>
				<input type="date" id="passportDate" value="<?= !empty($student['passportDate']) ? $student['passportDate'] : '' ?>" class="form-control" name="passportDate" placeholder="Տրման ամսաթիվ">
			</div>
			<div class="form-group col-md-4">
				<label for="passportFrom">Ում կողմից</label>
				<input type="number" id="passportFrom" value="<?= !empty($student['passportFrom']) ? $student['passportFrom'] : '' ?>" class="form-control" name="passportFrom" placeholder="Ում կողմից">
			</div>

			<div class="form-group col-md-4">
				<label for="address">Հասցե</label>
				<input type="text" id="address" value="<?= !empty($student['address']) ? $student['address'] : '' ?>" class="form-control" name="address" placeholder="Հասցե" required>
			</div>
			<div class="form-group col-md-4">
				<label for="firstPhone">Հեռախոսահամար 1</label>
				<input type="text" id="firstPhone" value="<?= !empty($student['firstPhone']) ? $student['firstPhone'] : '' ?>" class="form-control" name="firstPhone" placeholder="Հեռախոսահամար 1" required>
			</div>
			<div class="form-group col-md-4">
				<label for="secondPhone">Հեռախոսահամար 2</label>
				<input type="text" id="secondPhone" value="<?= !empty($student['secondPhone']) ? $student['secondPhone'] : '' ?>" class="form-control" name="secondPhone" placeholder="Հեռախոսահամար 2">
			</div>

			<div class="form-group col-md-4">
				<label for="branch">Մասնաճյուղ</label>
				<select id="branch" class="form-control" name="branch">
					<option value="1" <?= !empty($student['branch']) && $student['branch'] === '1' ? 'selected' : '' ?>>«Կոլիբրիլաբ» ՍՊԸ</option>
					<option value="2" <?= !empty($student['branch']) && $student['branch'] === '2' ? 'selected' : '' ?>>«Կոլիբրի ուսումնական կենտրոն» ՍՊԸ</option>
				</select>
			</div>

			<?php
			if(!empty($student)) {
			?>
				<div class="form-group col-md-4">
					<label for="active">Ակտի՞վ է</label>
					<select id="active" class="form-control" name="active" required>
						<option value="0" <?= empty($student['active']) ? 'selected' : '' ?> >Ոչ</option>
						<option value="1" <?= !empty($student['active']) ? 'selected' : '' ?> >Այո</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="active">Ավարտե՞լ է</label>
					<select id="active" class="form-control" name="complete" required>
						<option value="0" <?= empty($student['complete']) ? 'selected' : '' ?> >Ոչ</option>
						<option value="1" <?= !empty($student['complete']) ? 'selected' : '' ?> >Այո</option>
					</select>
				</div>
			<?php
			}
			?>

			<div class="form-group col-md-12">
				<button type="submit" class="btn btn-primary"><?= empty($student) ? 'Գրանցել' : 'Պահպանել' ?></button>
				<?php
				if(!empty($student)) {
				?>
				<a role="button" class="btn btn-success" target="_blank" href="/students/generate/<?= $student['id'] ?>">Ստեղծել պայմանագիր</a>
				<?php
				}
				?>
			</div>
		</form>
	</div>
	<div id="payments">
	<?php
	if(!empty($student['payments'])) {
		foreach ($student['payments'] as $i => $payment) {
			?>
			<form class="row form-group payment-days" method="post" action="/payments/edit/<?= $payment['id'] ?>">
				<input type="hidden" name="payed" value="<?= empty($payment['payed']) ? '1' : '0' ?>">
				<div class="col-md-offset-1 col-md-2 list-item-title"><?= $payment['paymentDate'] ?></div>
				<div class="col-md-2">
					<?php
					if(empty($payment['payed'])) {
						?>
						<input type="date" name="payedDate" placeholder="Վճարման օր" class="form-control" required>
						<?php
					} else {
						?>
						<div class="list-item-title"><?= $payment['payedDate'] ?></div>
						<?php
					}
					?>
				</div>
				<div class="col-md-2">
					<?php
					if(empty($payment['payed'])) {
						?>
						<input type="text" name="comment" placeholder="Մեկնաբանություն" class="form-control">
						<?php
					} else {
						?>
						<div class="list-item-title"><?= $payment['comment'] ?></div>
						<?php
					}
					?>
				</div>
				<div class="col-md-2">
					<?php
					if(empty($payment['payed'])) {
						?>
						<input type="number" name="cash" placeholder="Գումար" class="form-control" required>
						<?php
					} else {
						?>
						<div class="list-item-title"><?= $payment['cash'] ?></div>
						<?php
					}
					?>
				</div>
				<div class="col-md-1">
					<button type="submit" class="btn <?= empty($payment['payed']) ? 'btn-success' : 'btn-danger' ?>"><?= empty($payment['payed']) ? 'Վճարել' : 'Չեղարկել' ?></button>
				</div>
				<?php
				if(empty($payment['payed'])) {
				?>
				<div class="col-md-1">
					<button type="button" class="btn btn-danger delete-payment">X</button>
				</div>
				<?php
				}
				?>
			</form>
			<?php
		}
		?>
		<div class="row">
			<div class="col-md-offset-1 col-md-2 list-item-title">
				<input type="date" id="payment-date" class="form-control">
			</div>
			<div class="col-md-offset-6 col-md-2 list-item-title">
				<button type="button" class="btn btn-success add-payment">Ավելացնել</button>
			</div>
		</div>
		<script src="/js/payments.js"></script>
		<?php
	}
	?>
	</div>
</article>

