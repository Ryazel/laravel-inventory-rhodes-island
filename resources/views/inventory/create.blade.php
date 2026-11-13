<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operator Data - HR Panel</title> 
    <style> 
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --danger: #dc2626;
            --danger-hover: #b91c1c;
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #334155;
            --border-color: #cbd5e1;
        }

        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-image: url('{{ asset('images/background-main.jpg') }}'); 
            color: var(--text-main);
            margin: 0; 
            padding: 30px; 
        } 

        nav {
            text-align: center;
            margin-bottom: 25px;
            background-color: black;
            padding: 12px 20px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgb(255, 254, 254);
           
        }

        nav a { 
            margin-right: 20px; 
            text-decoration: none; 
            color: white; 
            font-weight: 600;
            text-shadow: 2px 1px 2px lightcyan;
        } 

        nav a:hover {
            text-decoration: underline;
        }

        .kotak { 
            background: var(--bg-card); 
            padding: 24px; 
            border-radius: 12px; 
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05), 0 2px 4px -1px rgba(0,0,0,0.03);
            max-width: 900px;
            margin: 0 auto;
        } 

        h1 { 
            color: #1e293b; 
            font-size: 1.5rem;
            margin-top: 0;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 10px;
        } 

        h2 {
            font-size: 1.2rem;
            color: #475569;
            margin-top: 20px;
        }

        /* Alert Styling */
        .alert-error {
            background-color: #fef2f2;
            border-left: 4px solid var(--danger);
            color: #991b1b;
            padding: 12px 16px;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        .alert-error ul {
            margin: 0;
            padding-left: 20px;
        }

        .alert-success {
            background-color: #f0fdf4;
            border-left: 4px solid #16a34a;
            color: #166534;
            padding: 12px 16px;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 9px 12px;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 0.95rem;
            box-sizing: border-box;
            transition: border-color 0.2s;
        }

        input[type="text"]:focus, input[type="number"]:focus, select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        button[type="submit"] {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 18px;
            font-size: 0.95rem;
            font-weight: 600;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        button[type="submit"]:hover {
            background-color: var(--primary-hover);
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        th {
            background-color: #f1f5f9;
            color: #475569;
            font-weight: 600;
            text-align: left;
            padding: 12px 14px;
            font-size: 0.9rem;
            border-bottom: 1px solid #e2e8f0;
        }

        td {
            padding: 12px 14px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 0.9rem;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: #f8fafc;
        }

        /* Tombol Hapus Kecil di Tabel */
        .btn-delete {
            background-color: var(--danger);
            color: white;
            border: none;
            padding: 6px 12px;
            font-size: 0.85rem;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
        }

        .btn-delete:hover {
            background-color: var(--danger-hover);
        }

        .text-center {
            text-align: center;
            color: #64748b;
        }

    </style> 
</head> 
<body>

    <nav> 
        <a href="/inventory">Inventory List</a> 
        <a href="/inventory/create">Add new Item</a> 
    </nav> 

    <div class="kotak"> 
        <h1 style="text-align: center; color:white ;background-color: black; border-bottom: 2px solid black; border-top:2px solid black;">
            <b><u>Rhodes Island Inventory Manager</u></b></h1> 
        <div style="text-align: center; background-image: url('{{ asset('images/background-doctor.jpg') }}'); border: 2px solid black;">
         <img src="{{ asset('images/Rhodes_Island.webp') }}" alt="Logo" width="200px">
        </div>

        <h2>Inventory Input</h2> 
        
        <!-- Notifikasi Error Validasi -->
        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error) 
                        <li>{{ $error }}</li>
                    @endforeach 
                </ul>
            </div>
        @endif

        <!-- Notifikasi Sukses -->
        @if (session('success')) 
            <div class="alert-success">
                {{ session('success') }}
            </div> 
        @endif 

        <form action="{{ route('inventory.store') }}" method="POST"> 
            @csrf 
            <div style="border-right: 2px solid black; border-left:2px solid black">
            <div class="form-group">
                <label style="font-size: 20px;">-+Item Code</label>
                <input type="text" name="code_item" value="{{ old('code_item') }}" placeholder="Input Item UNique Code">
            </div>
          
            <div class="form-group">
                <label style="font-size: 20px;">-+Item Name</label>
                <input type="text" name="item_name" value="{{ old('item_name') }}" placeholder="Input Item Name">
            </div>
          
            <div class="form-group">
                <label style="font-size: 20px;">-+Item Quantity</label>
                    <input type="number" name="item_quantity" value="{{ old('item_quantity') }}" placeholder="Input Item Quantity"> 

                <div class="form-group">
                <label style="font-size: 20px;">-+Item Condition</label>
                <select name="item_condition"> 
                    <option value="Good">Good</option>
                    <option value="Broken">Broken</option>
                </select>
            </div>
            </div>
            </div>
          
            <button type="submit">Add Item</button> 
        </form> 

    </div> 

</body> 
</html>

<!-- <div>
     <h1>This Page is for creating input data</h1>
</div> -->
