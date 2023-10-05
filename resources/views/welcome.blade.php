<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>SALES CUSTOMER</title>
</head>

<body>
    <div class="mt-5">
        <div class="card w-50 m-auto">
            <div class="card-header">
                Sales Form
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="customer">Customer Name</label>
                    <select class="form-control" id="customer">
                        <option selected>-- choose data--</option>
                        @foreach ($customers as $customer)
                        <option value="{{$customer->customerid}}">{{$customer->customer_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card d-none" id="alamat-container">
                    <div class="card-body" id="alamat">
                    </div>
                </div>
                <div class="card mt-3 d-none" id="sales-container">
                    <div class="card-body" id="sales">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script>
        $("#customer").on('change', function() {
            let id = $(this).val()
            $.ajax({
                url: `{{url('get-data-sales')}}/${id}`,
                method: "GET",
                success: function(resp) {
                    $("#alamat-container").removeClass('d-none')
                    $("#sales-container").removeClass('d-none')
                    $("#alamat").text(resp.alamat.customer_alamat)
                    let html = `<ul class="list-group">`;
                    let total = 0;
                    resp.sales.forEach(function(item) {
                        total += parseFloat(item.total_sales)
                        html += `
                        <li class="list-group-item">
                            <ul>
                                <li>${rupiah(item.total_sales)}</li>
                                <li>${item.tanggal_transaksi}</li>
                            </ul>
                        </li>
                        `
                    })
                    html += `<li class="list-group-item active" aria-current="true">Total Sales : ${rupiah(total)}</li>`
                    html += `</ul>`
                    $("#sales").html(html)
                }
            })
        })
        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }
    </script>
</body>

</html>