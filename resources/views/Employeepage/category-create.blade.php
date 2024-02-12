<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Employee Create </h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container mx-auto">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Employee Name *</label>
                                <input type="text" class="form-control" id="EmployeeName">
                            </div>
                            <div class="col-12 p-1">
                                <label class="form-label">Employee Commission*</label>
                                <input type="text" class="form-control" id="EmployeeCommission">
                            </div>  
                            <div class="col-12 p-1">
                                <label class="form-label">Image</label>
                                <input  type="file" class="form-control" id="EmployeeImg">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>
<script>
    
    async function Save() {
        let EmployeeName = document.getElementById('EmployeeName').value;
        let EmployeeCommission = document.getElementById('EmployeeCommission').value;
        let EmployeeImage = document.getElementById('EmployeeImg').files[0]; // Access the file object

        if (EmployeeName.length === 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Field is Required.'
            });
        } else if (EmployeeCommission.length === 0) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Field is Required!'
            });
        } else {
            document.getElementById('modal-close').click();
            try {
                let formData = new FormData();
                formData.append('name', EmployeeName);
                formData.append('commission', EmployeeCommission);
                formData.append('image', EmployeeImage); // Append the file object

                let response = await axios.post('/employee/save', formData);

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
                    loadData(); // Call the loadData function if necessary
                    document.getElementById('save-form').reset();
                }
            } catch (error){
                console.error('Error occurred:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while processing your request.'
                });
            }
        }
    }
</script>
