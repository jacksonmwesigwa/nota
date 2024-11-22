@props(['message_title', 'message_content'])
<div x-cloak x-data="{ alertIsVisible: false }" x-init="setTimeout(() => {
    alertIsVisible = true;
    setTimeout(() => alertIsVisible = false, 3000)
}, 200)" x-show="alertIsVisible"
    class="fixed right-5 bottom-20 ml-[1rem] overflow-hidden rounded-md border border-sky-500 bg-white text-neutral-600 dark:bg-neutral-950 dark:text-neutral-300"
    role="alert" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
    <div class="flex w-full items-center gap-2 bg-sky-500/10 p-4">
        <div class="bg-sky-500/15 text-sky-500 rounded-full p-1" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6"
                aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-7-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM9 9a.75.75 0 0 0 0 1.5h.253a.25.25 0 0 1 .244.304l-.459 2.066A1.75 1.75 0 0 0 10.747 15H11a.75.75 0 0 0 0-1.5h-.253a.25.25 0 0 1-.244-.304l.459-2.066A1.75 1.75 0 0 0 9.253 9H9Z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-2">
            <h3 class="text-sm font-semibold text-sky-500">{{ $message_title }}</h3>
            <p class="text-xs font-medium sm:text-sm">{{ $message_content }}
            </p>
        </div>
        <button type="button" @click="alertIsVisible = false" class="ml-auto" aria-label="dismiss alert">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                fill="none" stroke-width="2.5" class="w-4 h-4 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
</div>
