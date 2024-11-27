// Store current user ID for modal operations
let currentUserId = null;

// Open Details Modal
function openDetails(button) {
    currentUserId = button.dataset.userid;
    const row = button.closest('tr');
    
    // Get user data from table row
    document.getElementById('userid').textContent = currentUserId;
    document.getElementById('name').textContent = row.cells[1].textContent;
    document.getElementById('email').textContent = row.cells[2].textContent;
    
    document.getElementById('view-details').style.display = 'block';
}

// Open Update Modal
function openUpdate(button) {
    currentUserId = button.dataset.userid;
    const row = button.closest('tr');
    
    // Populate form with current data
    document.getElementById('update-name').value = row.cells[1].textContent;
    document.getElementById('update-email').value = row.cells[2].textContent;
    
    document.getElementById('update-details').style.display = 'block';
}

// Open Delete Modal
function openDelete(button) {
    currentUserId = button.dataset.userid;
    document.getElementById('del-details').style.display = 'block';
}

// Close Modals
function closeDetails() {
    document.getElementById('view-details').style.display = 'none';
    currentUserId = null;
}

function closeUpdate() {
    document.getElementById('update-details').style.display = 'none';
    currentUserId = null;
}

function closeDelete() {
    document.getElementById('del-details').style.display = 'none';
    currentUserId = null;
}

// Handle Update Form Submission
function handleUpdate(event) {
    event.preventDefault();
    
    const name = document.getElementById('update-name').value;
    const email = document.getElementById('update-email').value;
    
    // Here you would typically make an API call to update the user
    console.log('Updating user:', {
        id: currentUserId,
        name: name,
        email: email
    });
    
    // Update the table row (in a real app, do this after successful API call)
    const rows = document.querySelectorAll('tr');
    for (let row of rows) {
        const firstCell = row.cells[0];
        if (firstCell && firstCell.textContent === currentUserId) {
            row.cells[1].textContent = name;
            row.cells[2].textContent = email;
            break;
        }
    }
    
    closeUpdate();
}

// Handle Delete Confirmation
function confirmDelete() {
    // Here you would typically make an API call to delete the user
    console.log('Deleting user:', currentUserId);
    
    // Remove the table row (in a real app, do this after successful API call)
    const rows = document.querySelectorAll('tr');
    for (let row of rows) {
        const firstCell = row.cells[0];
        if (firstCell && firstCell.textContent === currentUserId) {
            row.remove();
            break;
        }
    }
    
    closeDelete();
}

// Close modals when clicking outside
window.onclick = function(event) {
    const modals = document.getElementsByClassName('modal');
    for (let modal of modals) {
        if (event.target === modal) {
            modal.style.display = 'none';
            currentUserId = null;
        }
    }
}

// Pagination state
let currentPage = 1;
const itemsPerPage = 10;
let totalPages = 1;
let users = [];

// Initialize the table
document.addEventListener('DOMContentLoaded', async function() {
    await loadUsers();
    setupEventListeners();
});

async function loadUsers() {
    try {
        // Replace this with your actual API call
        const response = await fetch('/api/users');
        users = await response.json();
        
        totalPages = Math.ceil(users.length / itemsPerPage);
        updatePagination();
        displayUsers();
    } catch (error) {
        console.error('Error loading users:', error);
        alert('Failed to load users');
    }
}

function displayUsers() {
    const tableBody = document.getElementById('users-table-body');
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedUsers = users.slice(start, end);
    
    tableBody.innerHTML = paginatedUsers.map(user => `
        <tr data-user-id="${user.id}">
            <td>${user.fullName}</td>
            <td>${user.email}</td>
            <td>
                <span class="role-badge role-${user.role.toLowerCase()}">
                    ${user.role}
                </span>
            </td>
            <td>${formatDate(user.createdAt)}</td>
            <td>
                <button class="btn delete-btn" onclick="showDeleteModal('${user.id}')">
                    Delete
                </button>
            </td>
        </tr>
    `).join('');
}

function updatePagination() {
    const prevButton = document.getElementById('prev-page');
    const nextButton = document.getElementById('next-page');
    const pageInfo = document.getElementById('page-info');
    
    prevButton.disabled = currentPage === 1;
    nextButton.disabled = currentPage === totalPages;
    pageInfo.textContent = `Page ${currentPage} of ${totalPages}`;
}

function setupEventListeners() {
    document.getElementById('prev-page').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            displayUsers();
            updatePagination();
        }
    });
    
    document.getElementById('next-page').addEventListener('click', () => {
        if (currentPage < totalPages) {
            currentPage++;
            displayUsers();
            updatePagination();
        }
    });
    
    // Delete modal buttons
    document.getElementById('cancel-delete').addEventListener('click', hideDeleteModal);
    document.getElementById('confirm-delete').addEventListener('click', deleteUser);
}

// Delete functionality
let userToDelete = null;

function showDeleteModal(userId) {
    userToDelete = userId;
    document.getElementById('delete-modal').style.display = 'block';
}

function hideDeleteModal() {
    userToDelete = null;
    document.getElementById('delete-modal').style.display = 'none';
}

async function deleteUser() {
    if (!userToDelete) return;
    
    try {
        // Replace with your actual API call
        await fetch(`/api/users/${userToDelete}`, {
            method: 'DELETE'
        });
        
        // Remove user from local array
        users = users.filter(user => user.id !== userToDelete);
        totalPages = Math.ceil(users.length / itemsPerPage);
        
        // Adjust current page if necessary
        if (currentPage > totalPages) {
            currentPage = totalPages;
        }
        
        // Update display
        displayUsers();
        updatePagination();
        hideDeleteModal();
        
        // Show success message
        alert('User deleted successfully');
    } catch (error) {
        console.error('Error deleting user:', error);
        alert('Failed to delete user');
    }
}

// Utility function to format dates
function formatDate(dateString) {
    const options = { 
        year: 'numeric', 
        month: 'short', 
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    };
    return new Date(dateString).toLocaleDateString('en-US', options);
}