document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('comment-form');
    if (form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const userId = document.getElementById('comment-user-id').value;
            const title = document.getElementById('comment-event-title').value.trim();
            const comment = document.getElementById('comment-text').value.trim();

            fetch('submit_comment.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ title, comment })
            })
            .then(res => res.json())
            .then(response => {
                if (response.success) {
                    alert("✅ Comment added!");
                    loadComments(title);
                    form.reset();
                } else {
                    alert("❌ " + response.message);
                }
            });
        });

        function loadComments(title) {
            fetch('fetch_comments.php?title=' + encodeURIComponent(title))
            .then(res => res.json())
            .then(response => {
                if (response.success) {
                    const container = document.getElementById('comments-container');
                    container.innerHTML = response.comments.map(c =>
                        `<div class='comment' style="padding: 10px; border-bottom: 1px solid #444;"><p>${c.comment}</p><small>${c.created_at}</small></div>`
                    ).join('');
                }
            });
        }

        form.querySelector('#comment-event-title').addEventListener('blur', (e) => {
            const title = e.target.value.trim();
            if (title) loadComments(title);
        });
    }
});