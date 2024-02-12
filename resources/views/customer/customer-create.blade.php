<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Under Employee Name </h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Senior Employee Name*</label>
                                <select type="text" class="form-control form-select" id="EmployeeName">
                                    <option value="">Select Employee Name</option>
                                </select>
                                <label class="form-label">Under Employee Designation*</label>
                                <input type="text" class="form-control" id="UnderEmployeeDesignation">
                              
                                <label class="form-label">Under Employee Name*</label>
                                <input type="text" class="form-control" id="UnderEmployeeName"> 

                                <label class="form-label">Under Employee Commission*</label>
                                <input type="text" class="form-control" id="UnderEmployeeCommission">   
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn  bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>

<script>

             FillCategoryDropDown();

async function FillCategoryDropDown(){
    let res = await axios.get("/list-employee")
    res.data.forEach(function (item,i) {
        let option=`<option value="${item['id']}">${item['name']}</option>`
        $("#EmployeeName").append(option);
    })
}

async function Save() {
    let EmployeeNameID = document.getElementById("EmployeeName").value;
    let UnderEmployeeName = document.getElementById("UnderEmployeeName").value;
    let UnderEmployeeCommission = document.getElementById("UnderEmployeeCommission").value;
    let UnderEmployeeDesignation = document.getElementById("UnderEmployeeDesignation").value;

    try {
        document.getElementById('modal-close').click();
        let response = await axios.post('/savedata', {
            employee_id: EmployeeNameID,
            UnderName1: UnderEmployeeName,
            Commission1: UnderEmployeeCommission,
            Designation1: UnderEmployeeDesignation
        });

        if (response.data === 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No data added.'
            });
        } else {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Employee Added Successfully.'
            });
            // Call the loadData function if necessary
            document.getElementById('save-form').reset();
           
        }
    } catch (error) {
        console.error("error", error);
        // Handle error properly, e.g., display an error message to the user
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error occurred while processing your request.'
        });
    }
}

</script>

