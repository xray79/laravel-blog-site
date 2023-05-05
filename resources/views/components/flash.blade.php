<div 
x-data="{show: true}"
x-init="setTimeout(() => show = false, 4000)"
x-show="show"
class="fixed right-3 bottom-3 bg-blue-500 px-5 py-3 rounded-xl text-white text-sm">
    <p>{{ session('success') }}</p>
</div>