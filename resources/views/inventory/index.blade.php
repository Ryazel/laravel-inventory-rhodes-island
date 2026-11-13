<!-- Index for inventorys -->
<style>
   nav a{
      display: block;
      text-align: center;
      color: white;
   }
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
 </style>
<body style="background-color:black">
 <div>
    <div style="text-align:center; border:2px solid white">
    <img src="{{ asset('images/Rhodes_Island.webp') }}" alt="Logo">
    <img src="{{ asset('images/Kal_icon.png') }}" alt="Logo">
    </div> 
    <h1 style="text-align:center; color:white;">Rhodes Island Inventory List</h1>
    <nav style="color:white; border:2px solid white;">
     <a href="https://ryazel.github.io/AKPortfolio">Github Profile</a>
     <hr>
     <a href="/inventory/create">ADD ITEM</a>
    </nav>
 </div>

 <h2 style="margin-top: 35px; color:white;">List of Items</h2>

<table>
    <thead>
        <tr>
            <th>Code</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Condition</th>
            <th style="width: 90px; text-align: center;">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dataInventory as $inventory)
            <tr>
                <td>{{ $inventory->code_item }}</td>
                <td>{{ $inventory->item_name }}</td>
                <td>{{ $inventory->item_quantity }}</td>
                <td>{{ $inventory->item_condition }}</td>

        <!-- here edit button -->
                <td style="text-align: center;">
                    <form action="{{ route('inventory.destroy', $inventory->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button style="color: white; background-color: darkred"
                         type="submit" class="btn-delete" onclick="return confirm('Delete this data?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center" style="padding: 20px; text-align:center">No Itemss Registered.</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
