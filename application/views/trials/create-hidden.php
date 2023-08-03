<table class="d-none">
    <tbody class="entry-hidden">
        <tr class="text-center entry-row">
            <td>
                <select required name="job_type_id[]" class="form-select digits">
                    <?php
                    foreach ($job_types as $job_type) {
                    ?>
                        <option value="<?= $job_type['id'] ?>"><?= $job_type['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
            <td>
                <input required name="jar_number[]" value="" class="form-control" type="number">
            </td>
            <td>
                <input required name="max_pull[]" value="" class="form-control" type="number">
            </td>
            <td>
                <input required name="max_depth[]" value="" class="form-control" type="number">
            </td>
            <td>
                <input required name="duration[]" value="" class="form-control" type="number">
            </td>
            <td class="sm-csv">
                <div class="media-body switch-md">
                    <label class="switch">
                        <input name="smart_monitor[]" type="checkbox" class="smart-monitor"><span class="switch-state"></span>
                    </label>
                </div>
                <button for="smart-monitor-csv" disabled class="btn btn-light smart-monitor-button" type="button" value="Browse...">
                    Upload
                </button>
                <input required id="smart-monitor-csv" disabled name="smart_monitor_csv[]" accept=".xls, .xlsx, application/vnd.ms-excel" class="form-control smart-monitor-csv" type="file" style="display: none;" />
                <small class="csv-name d-block"></small>
                <input name="smart_monitor_hidden[]" type="hidden" class="smart-monitor-hidden" value="0">
                <button disabled class="btn btn-light smart-monitor-csv-validate mt-3" type="button">
                    Validate
                </button>
                <br>
                <span class="badge rounded-pill badge-success csv-passed d-none">Passed</span>
                <span class="badge rounded-pill badge-danger csv-failed d-none">Failed</span>
                <input name="csv-result[]" class="csv-result" type="hidden" value="0">
            </td>
            <td>
                <textarea name="remarks[]" class="form-control" rows="5" cols="3"></textarea>
            </td>
            <td>
                <select required name="job_status[]" class="form-select digits">
                    <option value="Complete">Complete</option>
                    <option value="Rerun">To Rerun</option>
                </select>
            </td>
            <td>

            </td>
        </tr>
    </tbody>
</table>