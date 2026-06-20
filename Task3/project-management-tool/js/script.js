// Welcome Message
console.log("Project Management Tool Loaded Successfully");

// Confirm Before Logout
function confirmLogout() {
    return confirm("Are you sure you want to logout?");
}

// Confirm Before Status Update
function confirmStatusUpdate() {
    return confirm("Do you want to update task status?");
}

// Show Current Date in Console
let today = new Date();
console.log("Today's Date: " + today.toDateString());