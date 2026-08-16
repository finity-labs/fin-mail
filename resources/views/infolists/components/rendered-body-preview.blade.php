<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
        <iframe
            src="data:text/html;base64,{{ base64_encode($getRecord()->rendered_body) }}"
            class="w-full bg-white rounded-lg shadow-lg mx-auto"
            style="max-width: 700px; min-height: 500px; border: none;"
            sandbox="allow-same-origin"
        ></iframe>
    </div>
</x-dynamic-component>
