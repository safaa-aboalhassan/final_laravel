// Fetch products via AJAX
alert("so good")
 fetch('http://localhost?table=api/food')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#menu-table tbody');
            
            if (data.length > 0 && !data.message) {
                data.forEach(menu => {
                    const row = document.createElement('tr');
                    
                    row.innerHTML = `
                        <td><img src="${menu.image}" alt="${menu.name}" width="50"></td>
                        <td>${menu.name}</td>
                        <td>${menu.description}</td>
                        <td>$${menu.price}</td>
                    `;
                     
                    tableBody.appendChild(row);
                });
            } else {
                const row = document.createElement('tr');
                row.innerHTML = `<td colspan="4">No menus available at the moment.</td>`;
                tableBody.appendChild(row);
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });