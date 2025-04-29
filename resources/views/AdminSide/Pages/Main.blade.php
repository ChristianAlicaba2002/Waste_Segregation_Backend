<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/IM_logo.png" type="image/x-icon">
    <title>Admin</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            background-color: white;
        }

        .dashboard-container {
            background: transparent;
            border-left: #81c784 5px solid;
            border-radius: 30px;
            width: 100%;
            overflow: hidden;
            height: auto;
        }

        .sidebar {
            margin: 0;
            color: #388e3c;
            transition: width 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            padding: 20px;
            width: 100px;
            overflow: hidden;
        }

        .sidebar:hover {
            width: 280px;
            align-items: flex-start;
        }

        .Binnie {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
            width: 100%;
        }

        .sidebar .Binnie img {
            margin: 0;
            width: 70px;
            height: 70px;
            margin-left: 1rem;
            transition: margin-right 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .sidebar:hover .Binnie img {
            margin-right: 10px;
        }

        .name {
            font-family: 'DM Serif Display', serif;
            font-size: 1.1rem;
            color: #388e3c;
            text-decoration: none;
            white-space: nowrap;
            letter-spacing: 2px;
            opacity: 0;
            transition: opacity 0.3s cubic-bezier(0.19, 1, 0.22, 1), margin-left 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .sidebar:hover .name {
            opacity: 1;
            margin-left: 10px;
        }

        .menu {
            margin-top: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
        }

        .menu li {
            padding: 8px 25px;
            gap: 8px;
            display: flex;
            align-items: center;
            cursor: pointer;
            margin-top: 1rem;
            margin-bottom: 1.5rem;
            color: #2e7d32;
            font-size: 0.9rem;
            font-weight: 400;
            position: relative;
            border-radius: 25px;
            background-color: transparent;
            transition: all 0.3s ease;
        }

        .menu li:hover {
            border: rgb(151, 218, 155) 1px solid;
            background-color: white;
            box-shadow: 0 2px 2px rgba(177, 247, 186, 0.62);
            transform: scale(1.02) translateY(-1px);
            color: #1b5e20;
            filter: brightness(1.1);
        }

        .menu li.active {
            background-color: transparent;
            border: rgb(133, 185, 135) 1px solid;
            color: #1b5e20;
            font-weight: 500;
            transform: scale(1.02) translateY(-1px);
            filter: brightness(0.9);
        }

        .menu li img.menu-icon {
            width: 35px;
            height: 35px;
            opacity: 0.85;
            transition: transform 0.4s ease;
            margin-right: 5px;
        }

        .menu li:hover img.menu-icon {
            transform: scale(1.2);

        }

        .menu li span {
            white-space: nowrap;
            opacity: 0;
            margin-left: 0;
            transition: opacity 0.3s ease, margin-left 0.3s ease;
        }

        .sidebar:hover .menu li span {
            opacity: 1;
            margin-left: 3px;
        }

        .logout-form {
            margin-top: 2rem;
            padding-top: 15px;
            width: 100%;
        }

        .logout-form button.Logout {
            background: none;
            border: none;
            color: #43a047;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            cursor: pointer;
            width: 100%;
            font-size: 0.9rem;
            text-align: left;
            transition: background-color 0.2s ease-in-out;
        }

        .logout-form button.Logout img.menu-icon {
            margin-right: 0;
            width: 40px;
            height: 40px;
            opacity: 0.8;
            transition: margin-right 0.3s cubic-bezier(0.19, 1, 0.22, 1), opacity 0.3s cubic-bezier(0.19, 1, 0.22, 1), transform 0.3s cubic-bezier(0.19, 1, 0.22, 1);
        }

        .sidebar:hover .logout-form button.Logout img.menu-icon {
            margin-right: 8px;
        }

        .logout-form button.Logout:hover img.menu-icon {
            opacity: 1;
            transform: scale(1.05);
        }

        .logout-form button.Logout span {
            white-space: nowrap;
            opacity: 0;
            transition: opacity 0.3s cubic-bezier(0.19, 1, 0.22, 1), margin-left 0.3s cubic-bezier(0.19, 1, 0.22, 1);
            margin-left: 0;
        }

        .sidebar:hover .logout-form button.Logout span {
            opacity: 1;
            margin-left: 3px;
        }

        .content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .section {
            display: none;
            margin-bottom: 20px;
            overflow-y: auto;
        }

        .section.active {
            display: block;
        }

        #homeContent h1 {
            font-size: 2em;
            color: #388e3c;
            margin-bottom: 20px;
        }

        .trash-summary {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .card {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08);
            width: 180px;
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #81c784;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card i {
            font-size: 30px;
            margin-bottom: 10px;
            color: #4caf50;
        }

        .card h3 {
            font-size: 1.1em;
            margin-bottom: 8px;
            color: #388e3c;
        }

        .card .stat {
            width: 100%;
            height: 3px;
            background: linear-gradient(to left, #fff, #81c784);
            margin-bottom: 10px;
            border-radius: 1.5px;
        }

        .card h4 {
            margin-bottom: 3px;
            color: #555;
            font-size: 0.85em;
        }

        .card h5 {
            margin-bottom: 10px;
            color: #33691e;
            font-size: 0.95em;
        }

        .card p {
            font-size: 0.75em;
            color: #777;
        }

        #userContent {
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        #userContent h2 {
            color: #1b5e20;
            margin-bottom: 12px;
            font-size: 1.3em;
        }

        .Binnie-section {
            padding: 12px;
            border-radius: 4px;
        }

        .Binnie-section table {
            width: 100%;
            border-collapse: collapse;
            display: block;
        }

        .Binnie-section thead {
            display: block;
            width: 100%;
        }

        .Binnie-section tbody {
            display: block;
            width: 100%;
            height: fit-content;
            padding: 0.4rem;
            background-color: #81c784;
            border: #c8e6c9 1px solid;
            border-radius: 8px;
            color: white;
            box-sizing: border-box;
        }

        .Binnie-section th,
        .Binnie-section td {
            padding: 6px;
            text-align: left;
            font-size: 0.85em;
        }

        .Binnie-section th {
            font-weight: bold;
            color: gray;
        }

        .Binnie-section tr {
            display: flex;
            width: 100%;
            box-sizing: border-box;
        }

        .Binnie-section th,
        .Binnie-section td {
            flex: 1;
            box-sizing: border-box;
        }

        .Binnie-section thead tr {
            display: flex;
            width: 100%;
            box-sizing: border-box;
        }

        .Binnie-section thead th {
            flex: 1;
            box-sizing: border-box;
        }

        #tableContent {
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        #trashrecordContent h2,
        #tableContent h2,
        #supportContent h2,
        #garbageContent h2 {
            color: #1b5e20;
            margin-bottom: 12px;
        }

        .table-record-section {
            padding: 12px;
            border-radius: 4px;
        }

        .table-record-section table {
            width: 100%;
            border-collapse: collapse;
            display: block;
        }

        .table-record-section thead {
            display: block;
            width: 100%;
        }

        .table-record-section tbody {
            display: block;
            width: 100%;
            height: fit-content;
            padding: 0.8rem;
            border-radius: 30px;
            box-sizing: border-box;
        }

        .table-record-section th,
        .table-record-section td {
            padding: 8px;
            text-align: left;
            font-size: 0.85em;
        }

        .table-record-section th {
            font-weight: bold;
            color: #757575;
        }

        .table-record-section tr {
            display: flex;
            width: 100%;
            box-sizing: border-box;
        }

        .table-record-section th,
        .table-record-section td {
            flex: 1;
            box-sizing: border-box;
        }

        .table-record-section thead tr {
            display: flex;
            width: 100%;
            box-sizing: border-box;
        }

        .table-record-section thead th {
            flex: 1;
            box-sizing: border-box;
        }

        .table-record-section tbody tr {
            border: 1px solid rgb(225, 250, 224);
            background-color: #81c784;
            border-radius: 8px;
            margin-bottom: 0.8rem;
            padding: 0;
        }

        .table-record-section tbody button {
            width: 30%;
            padding: 0.6rem;
            background-color: white;
            border: rgb(177, 252, 202) 1px solid;
            border-radius: 30px;
            color: #388e3c;
            font-weight: bold;
            font-size: 0.9em;
        }

        .table-record-section tbody button:hover {
            background-color: whitesmoke;
            border: lightgreen 1px solid;
            color: lightgreen;
            transition: all 0.3s ease;
        }

        .totaltrash {
            width: auto;
            background-color: #e0f2e7;
            border: white 1px solid;
            border-radius: 15px;
            margin-top: 15px;
        }

        .category {
            display: flex;
            flex-direction: row;
            gap: 1rem;
            padding: 8px 15px;
            font-size: 0.8em;
        }

        .category h3 {
            font-size: 0.9em;
            color: #388e3c;
            margin: 0;
        }

        #showMessage {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            border: 1px solid rgba(255, 255, 255, 0.18);
            width: 80%;
            max-width: 600px;
            z-index: 1000;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
            color: #666;
            background: none;
            border: none;
            padding: 5px 10px;
        }

        .close-btn:hover {
            color: #333;
        }

        #showMessage p {
            margin: 0;
            color: #333;
            font-size: 1.1rem;
            line-height: 1.6;
            text-align: justify;
        }

        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <div class="Binnie">
            <img src="img/IM_logo.png" alt="IM Logo">
            <p class="name">TrashBinnie</p>
        </div>
        <nav class="menu">
            <ul>
                <li class="active" onclick="showSection('homeContent')">
                    <img src="img/home.png" class="menu-icon" alt="Home Icon">
                    <span>Home</span>
                </li>
                <li onclick="showSection('userContent')">
                    <img src="img/user.png" class="menu-icon" alt="User Icon">
                    <span>Users</span>
                </li>

                <li onclick="showSection('trashrecordContent')">
                    <img src="img/record.png" class="menu-icon" alt="Table Icon">
                    <span>Trash Record</span>
                </li>
                <li onclick="showSection('garbageContent')">
                    <img src="img/trash.png" class="menu-icon" alt="Table Icon">
                    <span>Bin Collected</span>
                </li>
                <li onclick="showSection('supportContent')">
                    <img src="img/support.png" class="menu-icon" alt="Table Icon">
                    <span>Support</span>
                </li>
            </ul>
        </nav>
        <form action="{{route('admin_logout')}}" method="post" class="logout-form">
            @csrf
            <button type="submit" class="Logout">
                <img src="img/logout.png" class="menu-icon" alt="Logout Icon">
                <span>Logout</span>
            </button>
        </form>
    </aside>

    <div class="dashboard-container">
        <main class="content">
            <section id="homeContent" class="section active">
                <h1>Welcome back, Admin!</h1>
                <div class="trash-summary">
                    <div class="card">
                        <i class="fas fa-newspaper"></i>
                        <h3>Paper Items</h3>
                        <div class="stat"></div>
                        <h4>TOTAL TRASH: </h4>
                        <h5>70</h5>
                    </div>
                    <div class="card">
                        <i class="fas fa-wine-bottle"></i>
                        <h3>Plastic Items</h3>
                        <div class="stat"></div>
                        <h4>TOTAL TRASH: </h4>
                        <h5>90</h5>
                    </div>
                    <div class="card">
                        <i class="fas fa-cog"></i>
                        <h3>Metal Items</h3>
                        <div class="stat"></div>
                        <h4>TOTAL TRASH: </h4>
                        <h5>80</h5>
                    </div>
            </section>

            <section id="userContent" class="section">
                <h2>User Information</h2>
                <div class="Binnie-section">
                    <table>
                        <thead>
                            <tr>
                                <th>Trashbinnie ID</th>
                                <th>User ID</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users) > 0)
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->binnie_id }}</td>
                                <td>{{ $user->client_id }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            @endforeach
                            @else
                            <td colspan="4">No client register</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </section>


            <section id="supportContent" class="section">
                <h2>Support</h2>
                <div class="table-record-section">
                    <table class="record-table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Support ID</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($noneUser) > 0)
                            @foreach($noneUser as $noneuser)
                            <tr>
                                <td>{{ $noneuser->id }}</td>
                                <td>{{ $noneuser->first_name }}</td>
                                <td>{{ $noneuser->last_name }}</td>
                                <td>{{ $noneuser->support_id }}</td>
                                <td>
                                    <button 
                                        class="view-btn"
                                        onclick="ShowMessage('{{$noneuser->support_id}}', '{{$noneuser->message}}')"
                                    >VIEW</button>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <td colspan="5" style="text-align: center;">No feedback yet..</td>
                            @endif
                        </tbody>
                    </table>
                </div>
            </section>

            <section id="trashrecordContent" class="section">
                <h2>Trash Record</h2>
                <div class="table-record-section">
                    <table class="record-table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Trash ID</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>90q23</td>
                                <td>1</td>
                                <td>Plastic</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="totaltrash" style="width: auto; background-color: lightgreen;  border: white 1px solid; border-radius:20px;
                                                    margin-top: 20%;">
                        <div class="category" style="display: flex; flex-direction:row; gap:10rem; padding:10px 20px;
                                                font-size: smaller;">
                            <h3>Total Items Segregated: </h3>
                            <h3>Paper: </h3>
                            <h3>Plastic: </h3>
                            <h3>Metal: </h3>
                        </div>
                    </div>
                </div>
            </section>

            <section id="garbageContent" class="section">
                <h2>Garbage Collector Record</h2>
                <div class="table-record-section">
                    <table class="record-table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Garbage Weight Collected: </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>90q23</td>
                                <td>100kilo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="totaltrash" style="width: auto; background-color: lightgreen;  border: white 1px solid; border-radius:20px;
                                                    margin-top: 20%;">
                    <div class="category" style="display: flex; flex-direction:row; gap:10rem; padding:10px 20px;
                                                font-size: smaller;">
                        <h3>Garbage Weight Collected: </h3>
                    </div>
            </section>

        </main>
    </div>

    @php
    $item = DB::table('waste_item')->get();
    $display = $item
    @endphp


    <script>
        function ShowMessage(supportId, message) {
            let messageElement = document.getElementById('showMessage');
            let overlay = document.getElementById('modalOverlay');
            let messageContent = document.getElementById('messageContent');
            
            messageContent.textContent = message;
            messageElement.style.display = 'block';
            overlay.style.display = 'block';
        }

        function closeMessage() {
            let messageElement = document.getElementById('showMessage');
            let overlay = document.getElementById('modalOverlay');
            
            messageElement.style.display = 'none';
            overlay.style.display = 'none';
        }

        function showSection(sectionId) {
            const allSections = document.querySelectorAll('.section');
            allSections.forEach(section => {
                section.style.display = 'none';
            });

            const targetSection = document.getElementById(sectionId);
            if (targetSection) {
                targetSection.style.display = 'block';
            }

            const menuItems = document.querySelectorAll('nav ul li');
            menuItems.forEach(item => item.classList.remove('active'));

            const clickedItem = Array.from(menuItems).find(item =>
                item.getAttribute('onclick').includes(`showSection('${sectionId}')`)
            );
            if (clickedItem) {
                clickedItem.classList.add('active');
            }
        }

        window.onload = function() {
            showSection('homeContent');
        };
    </script>

    <div class="modal-overlay" id="modalOverlay" onclick="closeMessage()"></div>
    <div id="showMessage">
        <button class="close-btn" onclick="closeMessage()">&times;</button>
        <p id="messageContent"></p>
    </div>

</body>

</html>