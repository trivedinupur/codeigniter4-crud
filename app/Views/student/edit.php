<?= $this->extend('layout') ?>

<?= $this->section('content') ?>  
    <div class="row">
        <div class="col-md-9">
            <?= form_open(
                $formUrl,
                [
                    'name' => 'form',
                    'method' => 'post',
                    'class' => 'mt-3',
                ]
            ) ?>
                <?php if (!empty($record['id'])) : ?>
                    <?= form_hidden('id', $record['id']) ?>
                <?php endif ?>
                <div class="form-group">
                    <label for="first_name">First Name*</label>
                    <input 
                        type="text" name="first_name" 
                        class="form-control"
                        maxlength="50"
                        placeholder="First name"
                        value="<?= !empty($record['first_name']) ? $record['first_name'] : '' ?>""
                        required
                    >
                    <?= $validation->showError('first_name') ?>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name*</label>
                    <input 
                        type="text" name="last_name" 
                        class="form-control" 
                        maxlength="50"
                        placeholder="Last name"
                        value="<?= !empty($record['last_name']) ? $record['last_name'] : '' ?>"
                        required
                    >
                    <?= $validation->showError('last_name') ?> 
                </div>
                
                <div class="form-group">
                    <label for="dob">Date of birth*</label>
                    <input 
                        type="date" name="dob" 
                        class="form-control" 
                        value="<?= !empty($record['dob']) ? $record['dob'] : '' ?>"
                        required
                    >
                    <?= $validation->showError('dob') ?>
                </div> 

                <div class="form-group">
                    <label for="gender">Gender*</label>
                    <select class="custom-select" name="gender" required>
                        <?php foreach ($genderEnum as $key => $val) : ?>
                            <option value="<?= $key ?>" <?= !empty($record['gender']) &&
                                $key === $record['gender'] ? 'selected' : '' ?>>
                                <?= $val ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                    <?= $validation->showError('gender') ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            <?= form_close() ?>
        </div>
    </div>  
<?= $this->endSection() ?>
