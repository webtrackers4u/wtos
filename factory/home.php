<?
global $site, $os;
include('config.php');
include($site['root-factory'].'top.php');
$formname = \Library\Classes\Request::getGet("form");
?>
<?php if($formname){
    $form = $os->getFormFromCache($formname);

    $columns = $os->getColumnsFromDatabase($formname);
    ?>
    <form>
        <div class="uk-card uk-card-outline uk-card-default uk-border-rounded">
            <div class="uk-card-header">
                <div class="uk-card-title">Configuration</div>
            </div>
            <div class="uk-card-body">
                <div uk-grid>
                    <div>
                        <label>Heading</label>
                        <input class="uk-input uk-form-small" type="text">
                    </div>
                    <div>
                        <label>Main Page</label>
                        <input class="uk-input uk-form-small" type="text">
                    </div>
                    <div>
                        <label>Ajax Page</label>
                        <input class="uk-input uk-form-small" type="text">
                    </div>
                </div>
            </div>
        </div>

        <div class="uk-card uk-card-outline uk-card-default uk-border-rounded uk-margin">
            <div class="uk-card-header">
                <div class="uk-card-title">Structure</div>
            </div>
            <table class="uk-table uk-table-small uk-table-striped uk-table-divider uk-table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th><span uk-icon="list"></span></th>
                    <th><span uk-icon="search"></span></th>
                    <th><span uk-icon="pencil"></span></th>
                    <th>Relation Type</th>
                    <th>Relation Keyword</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($columns as $column){?>
                    <tr>
                        <td>
                            <input  class="uk-input uk-form-small" type="text" readonly disabled value="<?= $column["name"]?>">
                        </td>
                        <td>
                            <input  class="uk-input uk-form-small" type="text" value="<?= $column["name"]?>">
                        </td>
                        <td>
                            <select class="uk-select uk-form-small">
                                <option>Date</option>
                                <option>Date Time</option>
                                <option>Varchar</option>
                                <option>Number</option>
                                <option>Text</option>
                            </select>
                        </td>
                        <td><input class="uk-checkbox" type="checkbox"></td>
                        <td><input class="uk-checkbox" type="checkbox"></td>
                        <td><input class="uk-checkbox" type="checkbox"></td>
                        <td>
                            <select class="uk-select uk-form-small">
                                <option>Array</option>
                                <option>Table</option>
                            </select>
                        </td>
                        <td><input class="uk-input uk-form-small"></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
<?php } ?>

<? include($site['root-factory'].'bottom.php'); ?>
