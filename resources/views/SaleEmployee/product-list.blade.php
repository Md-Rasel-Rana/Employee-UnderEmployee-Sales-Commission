<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4> Employee Sale List </h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0  bg-gradient-primary">Create Sale</button>
                </div>
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>Sale Price</th>
                     <th>commission</th>
                    <th>Unit</th>
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

    getList();
    async function getList(){

        let res = await axios.get("/sale-list");
       console.log(res);
        let tableList=$("#tableList");
        let tableData=$("#tableData");
    
        tableData.DataTable().destroy();
        tableList.empty();
    
        res.data.forEach(function (item,index){
            let row=`<tr>
                       
                        <td>${item['name']}</td>
                        <td>${item['commission']}</td>
                        <td>
                            <button data-id="${item['id']}" class="viewBtn btn btn-outline-dark text-sm px-3 py-1 btn-sm m-0"><i class="fa text-sm fa-eye"></i></button>
                            <button data-id="${item['id']}"  class="deleteBtn btn btn-outline-dark text-sm px-3 py-1 btn-sm m-0"><i class="fa text-sm  fa-trash-alt"></i></button>
                       </td>
                     </tr>`
            tableList.append(row)
        })
    
        $('.viewBtn').on('click', async function () {
            let id = $(this).data('id');
            let cus = $(this).data('cus');
           // await InvoiceDetails(cus,id)
        })
    
        $('.deleteBtn').on('click',function () {
            let id= $(this).data('id');
            //document.getElementById('deleteID').value=id;
            $("#delete-modal").modal('show');
        })
    
        new DataTable('#tableData',{
            order:[[0,'desc']],
            lengthMenu:[5,10,15,20,30]
        });
    
    }
    
    
    </script>
    
    
