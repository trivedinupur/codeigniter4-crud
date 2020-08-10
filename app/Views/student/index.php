<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="row">
        <!-- Heroes -->
        <div class="col-md-12">
            <a 
                href="<?php echo base_url('student/add') ?>" 
                class="btn btn-secondary"
            >
                Add
            </a>
            <div class="search-form clearfix mt-2">
                <form class="form-inline float-right" method="get" action="<?= $listingUrl ?>">
                    <label class="sr-only" for="inlineFormInputName2">Keyword</label>
                    <input 
                        type="text" 
                        name="keyword" 
                        class="form-control mb-2 mr-sm-2" 
                        placeholder="Search here"
                        value="<?= isset($queryParams['keyword']) ? $queryParams['keyword'] : '' ?>"
                    >

                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                    <a 
                        href="<?= $listingUrl ?>" 
                        class="btn btn-secondary mb-2 ml-2" 
                        title="Reset"
                    >
                        Reset
                    </a>
                </form>
            </div>
            <?php if (!empty($students)) : ?>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Dob</th>
                            <th>Gender</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($students as $row) : ?>
                        <tr>
                            <td><?= esc($row->id) ?></td>
                            <!--
                                Always escape data that users could have entered with the
                                `esc()` function. By default it assumes it's part of HTML.
                            -->
                            <td>
                                <?= esc($row->name()) ?>
                            </td>
                            <td><?= esc(date('d-m-Y', strtotime($row->dob))) ?></td>
                            <td><?= esc($genderEnum[$row->gender]) ?></td>
                            <td><?= esc(date('d-m-Y h:i:s a', strtotime($row->created_at))) ?></td>
                            <td>
                                <a 
                                    class="btn btn-secondary"
                                    href="<?= base_url('student/edit/' . $row->id) ?>"
                                    title="Edit"
                                >
                                    Edit
                                </a>
                                <a class="btn btn-secondary" 
                                    href="<?= base_url('student/delete/' . $row->id) ?>" 
                                    title="Delete"
                                    onclick="return confirm('Are you sure you want to delete this record?');"
                                >
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>

                <?php if ($pager) : ?>
                    <?= $pager->links() ?>
                <?php endif ?>
            <?php else : ?>
                <div class="alert alert-warning mt-3">
                    No Students found.
                </div>
            <?php endif ?>
        </div>
    </div>
<?= $this->endSection() ?>
