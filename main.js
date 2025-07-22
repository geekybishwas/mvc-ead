// Example posts functionality
const posts = [
    { id: 1, title: "First Post", content: "This is my first post" },
    { id: 2, title: "Second Post", content: "This is my second post" }
];

function displayPosts() {
    const app = document.getElementById('app');
    const postsHTML = posts.map(post => `
        <div class="post">
            <h2>${post.title}</h2>
            <p>${post.content}</p>
        </div>
    `).join('');
    
    app.innerHTML = postsHTML;
}

// Load posts when page loads
document.addEventListener('DOMContentLoaded', displayPosts);