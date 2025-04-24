<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="img/IM_logo.png" type="image/x-icon">
    <title>Dashboard</title>
    <style>
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    height: 100vh;
    display: flex;
    background-color: white;
}

.dashboard-container {
    border-left:rgb(117, 182, 120) 5px solid;
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
    width: 65px;
    overflow: hidden;
    background-color: transparent;
}

.sidebar:hover {
    width: 250px;
    align-items: flex-start;
}

.user-info {
    display: flex;
    align-items: center;
    margin-bottom: 2rem;
    padding: 15px 0;
    border-bottom: 1px solid #c8e6c9;
    width: 100%;
}

.sidebar .user-info img {
    width: 50px;
    height: 50px;
    margin-right: 0;
    transition: margin-right 0.3s cubic-bezier(0.19, 1, 0.22, 1);
}

.sidebar:hover .user-info img {
    margin-right: 10px;
}

.name {
    margin-left: 15px;
    font-family: 'DM Serif Display', serif;
    font-size: 1.3rem;
    color: #388e3c;
    text-decoration: none;
    white-space: nowrap;
    letter-spacing: .1rem;
    opacity: 0;
    transition: opacity 0.3s cubic-bezier(0.19, 1, 0.22, 1), margin-left 0.3s cubic-bezier(0.19, 1, 0.22, 1);
}

.sidebar:hover .name {
    opacity: 1;
    margin-left: 15px;
}

.menu {
    margin-top: 20px;
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
    padding: 10px 20px;
    gap: 10px;
    display: flex;
    align-items: center;
    cursor: pointer;
    margin-top: 2rem;
    margin-bottom: 3rem;
    color: white;
    font-size: 1rem;
    font-weight: 400;
    position: relative;
    border-radius: 12px;
    background-color: transparent;
    transition: all 0.3s ease;
    color:rgb(95, 158, 100)  ;

}

.menu li:hover {
    background-color: rgba(255, 255, 255, 0.2);
    box-shadow: 0 4px 4px rgba(177, 247, 186, 0.62);
    transform: translateY(-2px);
    color:rgb(19, 77, 22);

}

.menu li.active {
    border:rgb(179, 218, 182) 1px solid;
    color: #1b5e20;
    font-weight: 500;
    transform: translateY(-2px);
}

.menu li img.menu-icon {
    width: 24px;
    height: 24px;
    opacity: 0.85;
    transition: transform 0.3s ease;
}

.menu li:hover img.menu-icon {
    transform: scale(1.1);
}

.menu li span {
    white-space: nowrap;
    opacity: 0;
    margin-left: 0;
    transition: opacity 0.3s ease, margin-left 0.3s ease;
}

.sidebar:hover .menu li span {
    opacity: 1;
    margin-left: 5px;
}
.logout-form {
    margin-top: auto;
    padding-top: 20px;
    border-top: 1px solid #c8e6c9;
    width: 100%;
}

.logout-form button.Logout {
    background: none;
    border: none;
    color: #43a047;
    padding: 12px 20px;
    display: flex;
    align-items: center;
    cursor: pointer;
    width: 100%;
    font-size: 1rem;
    text-align: left;
    transition: background-color 0.2s ease-in-out;
}


.logout-form button.Logout img.menu-icon {
    margin-right: 0;
    width: 30px;
    height: 30px;
    opacity: 0.8;
    transition: margin-right 0.3s cubic-bezier(0.19, 1, 0.22, 1), opacity 0.3s cubic-bezier(0.19, 1, 0.22, 1), transform 0.3s cubic-bezier(0.19, 1, 0.22, 1);
}

.sidebar:hover .logout-form button.Logout img.menu-icon {
    margin-right: 10px;
}

.logout-form button.Logout:hover img.menu-icon {
    opacity: 1;
    transform: scale(1.1);
}

.logout-form button.Logout span {
    white-space: nowrap;
    opacity: 0;
    transition: opacity 0.3s cubic-bezier(0.19, 1, 0.22, 1), margin-left 0.3s cubic-bezier(0.19, 1, 0.22, 1);
    margin-left: 0;
}

.sidebar:hover .logout-form button.Logout span {
    opacity: 1;
    margin-left: 10px;
}

.content {
    padding: 30px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.section {
    display: none;
    margin-bottom: 30px;
        overflow-y: auto;

}

.section.active {
    display: block;
}

.trash-summary {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
  gap: 20px;
  padding: 20px;

}

.card {
    border-radius: 12px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  width: 300px;
  padding: 20px;
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  border: 1px solid rgb(87, 225, 144);
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.card i {
  font-size: 40px;
  margin-bottom: 15px;
  color:rgb(74, 195, 135);
}

.card h3 {
  font-size: 1.5em;
  margin-bottom: 10px;
  color: #558b2f;
}

.card .stat {
  width: 100%;
  height: 4px;
  background:linear-gradient(to left,rgb(255, 255, 255),rgb(106, 194, 142));
  margin-bottom: 15px;
  border-radius: 2px;
}

.card h4 {
  margin-bottom: 5px;
  color: #555;
}

.card h5 {
  margin-bottom: 15px;
  color: #33691e;
}

.card p {
  font-size: 0.8em;
  color: #777;
}


#userContent {
  padding: 20px;
  border-radius: 8px;
  margin-bottom: 20px;
}

#userContent h2 {
  color: #1b5e20;
  margin-bottom: 15px;
  font-size: 1.5em;
}

.user-info-section {
  padding: 15px;
  border-radius: 6px;
}

.user-info-section table {
  width: 100%;
  border-collapse: collapse;
  display: block;
}

.user-info-section thead {
  display: block;
  width: 100%;
}

.user-info-section tbody {
  display: block;
  width: 100%;
  height: fit-content;
  padding: .5rem;
  background-color: rgb(130, 202, 134);
  border: #c8e6c9 1px solid;
  border-radius: 10px;
  color: white;
  box-sizing: border-box;
}

.user-info-section th,
.user-info-section td {
  padding: 8px;
  text-align: left;
}

.user-info-section th {
  font-weight: bold;
  color: gray;
}

.user-info-section tr {
  display: flex;
  width: 100%;
  box-sizing: border-box;
}

.user-info-section th,
.user-info-section td {
  flex: 1;
  box-sizing: border-box;
}

.user-info-section thead tr {
  display: flex;
  width: 100%;
  box-sizing: border-box;
}

.user-info-section thead th {
  flex: 1;
  box-sizing: border-box;
}

#tableContent {
  padding: 20px;
  border-radius: 8px;
  margin-bottom: 20px;
}

#tableContent h2 {
  color: #1b5e20;
  margin-bottom: 15px;
  font-size: 1.5em;
}

.table-record-section {
  padding: 15px;
  border-radius: 6px;
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
  padding: 1rem;
  border-radius: 50px;
  box-sizing: border-box;
}

.table-record-section th,
.table-record-section td {
  padding: 10px;
  text-align: left;
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
  border: 1px solid rgb(222, 253, 223);
  background-color: #c8e6c9;
  border-radius: 10px;
  margin-bottom: 1rem;
  padding: 0;
}

</style>
</head>
<body>
    <aside class="sidebar">
        <div class="user-info">
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
                <li onclick="showSection('tableContent')">
                    <img src="img/table.png" class="menu-icon" alt="Table Icon">
                    <span>Table Record</span>
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
                <p>Here's a summary of the inside of your Trashbinnie:</p>
                <div class="trash-summary">
                <div class="card">
                    <i class="fas fa-newspaper"></i>
                    <h3>Paper Items</h3>
                    <div class="stat"></div>
                    <h4>Garbage Last Weight Collected: </h4>
                    <h5>70kilo</h5>
                    <p>9:00pm 09-08-35</p>
                </div>
                <div class="card">
                    <i class="fas fa-wine-bottle"></i>
                    <h3>Plastic Items</h3>
                    <div class="stat"></div>
                    <h4>Garbage Last Weight Collected: </h4>
                    <h5>70kilo</h5>
                    <p>9:00pm 09-08-35</p>
                </div>
                <div class="card">
                    <i class="fas fa-cog"></i>
                    <h3>Metal Items</h3>
                    <div class="stat"></div>
                    <h4>Garbage Last Weight Collected: </h4>
                    <h5>70kilo</h5>
                    <p>9:00pm 09-08-35</p>
                </div>
            </section>

            <section id="userContent" class="section">
                <h2>User Information</h2>
                <div class="user-info-section">
                    <table>
                        <thead>
                            <tr>
                                <th>Trashbinnie ID</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>TB12345</td>
                                <td>TrashBinFan</td>
                                <td>Binny</td>
                                <td>Binner</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

            <section id="tableContent" class="section">
                <h2>Table Record</h2>
                <div class="table-record-section">
                    <table class="record-table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Trashbinnie ID</th>
                                <th>Trash ID</th>
                                <th>Category</th>
                                <th>Garbage Last Weight Collected</th>
                                <th>User ID (Guest/Customer)</th>
                                <th>Support ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>[User ID 1]</td>
                                <td>[Trashbinnie ID 1]</td>
                                <td>[Trash ID 1]</td>
                                <td>[Category 1]</td>
                                <td>[Weight 1]</td>
                                <td>[Guest/Customer ID 1]</td>
                                <td>[Support ID 1]</td>
                            </tr>
                            <tr>
                                <td>[User ID 2]</td>
                                <td>[Trashbinnie ID 2]</td>
                                <td>[Trash ID 2]</td>
                                <td>[Category 2]</td>
                                <td>[Weight 2]</td>
                                <td>[Guest/Customer ID 2]</td>
                                <td>[Support ID 2]</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>

        </main>
    </div>

    @php
        $item = DB::table('waste_item')->get();
        $display = $item
    @endphp


    <script>
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

        window.onload = function () {
            showSection('homeContent');
        };
    </script>

    </body>
</html>
