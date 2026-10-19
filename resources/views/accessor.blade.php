<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Доступ</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-md p-6 w-full max-w-md">
        <h2 class="text-xl font-bold mb-4">Enter access key</h2>

        <input type="text"
               id="tokenInput"
               placeholder="Key..."
               autocomplete="off"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4">

        <button id="submitBtn"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition disabled:opacity-50">
            Enter
        </button>

        <div id="authError" class="hidden mt-3 text-red-600 text-sm"></div>
    </div>

    <script>
        const btn   = document.getElementById('submitBtn');
        const input = document.getElementById('tokenInput');
        const err   = document.getElementById('authError');

        async function submit() {
            const token = input.value.trim();
            if (!token) return;

            btn.disabled = true;
            btn.textContent = 'Validating key...';
            err.classList.add('hidden');

            try {
                const res = await fetch(window.location.pathname, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify({ token })
                });

                const data = await res.json();

                if (data.success) {
                    location.reload();
                } else {
                    err.textContent = data.message || 'No matches..';
                    err.classList.remove('hidden');
                }
            } catch {
                err.textContent = 'Connection error';
                err.classList.remove('hidden');
            } finally {
                btn.disabled = false;
                btn.textContent = 'Enter';
            }
        }

        btn.addEventListener('click', submit);
        input.addEventListener('keydown', e => { if (e.key === 'Enter') submit(); });
    </script>
</body>
</html>