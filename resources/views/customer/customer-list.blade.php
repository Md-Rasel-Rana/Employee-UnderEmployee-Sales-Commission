<div class=" container-fluid " >
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Create Under Employee Name</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn  m-0 bg-gradient-primary"> Create Under Employee Name </button>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Employee Name </th>
                    <th>Under Employee</th>
                    <th>Commission</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tableList">

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        loadData1();
    });

    async function loadData1(){
        try {
            let response = await axios.get('/employee-all-list');
            populateDataTable(response.data);
        } catch (error) {
            console.error(error);
        }
    }

    function populateDataTable(data) {
        let tableList = $("#tableList");
        let tableData = $("#tableData");
        tableData.DataTable().destroy();
        tableList.empty();

        data.forEach(function(item, index) {
            let row = `<tr>   
                        <td>${item.id}</td>
                        <td>${item.name}</td>
                        <td>`;
            // Loop through underemployees and append their names
            item.underemployees.forEach(function(underEmployee){
                row += `${underEmployee.UnderName1}<br>`;
            });
            row += `</td>
                    <td>${item.commission}%</td>
                    <td>
                        <button data-id="${item.id}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                        <button data-id="${item.id}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                    </td>
                    </tr>`;
            tableList.append(row);
        });

        $('.editBtn').on('click', async function() {
            let id = $(this).data('id');
            await FillUpUpdateForm(id);
            $("#update-modal").modal('show');
        });

        $('.deleteBtn').on('click', function() {
            let id = $(this).data('id');
            $("#delete-modal").modal('show');
            $("#deleteID").val(id);
        });

        new DataTable('#tableData', {
            order: [
                [0, 'desc']
            ],
            lengthMenu: [5, 10, 15, 20, 30]
        });
    }
</script>
