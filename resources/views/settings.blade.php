<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @if (session('status') === 'settings-updated')
                <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                    Settings saved successfully.
                </div>
            @endif

            <!-- Account & System Overview -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900">Account & Environment</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Your active session and application details.
                    </p>

                    <dl class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2 text-sm">
                        <div class="p-3 bg-gray-50 rounded-md">
                            <dt class="font-medium text-gray-500">Account Name</dt>
                            <dd class="mt-1 text-gray-900 font-semibold">{{ Auth::user()->name }}</dd>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-md">
                            <dt class="font-medium text-gray-500">Email Address</dt>
                            <dd class="mt-1 text-gray-900">{{ Auth::user()->email }}</dd>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-md">
                            <dt class="font-medium text-gray-500">Environment</dt>
                            <dd class="mt-1 text-gray-900 uppercase">{{ config('app.env') }}</dd>
                        </div>
                        <div class="p-3 bg-gray-50 rounded-md">
                            <dt class="font-medium text-gray-500">Quick Link</dt>
                            <dd class="mt-1">
                                <a href="{{ route('profile.edit') }}" class="text-indigo-600 hover:underline font-medium">
                                    Edit Profile & Password &rarr;
                                </a>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Application Preferences -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900">Application Preferences</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Configure your workspace and notification defaults.
                    </p>

                    <form method="POST" action="{{ route('settings.update') }}" class="mt-6 space-y-4">
                        @csrf
                        <label class="flex items-center gap-3">
                            <input type="checkbox" name="email_notifications" checked class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="text-sm text-gray-700">Enable email activity notifications</span>
                        </label>

                        <label class="flex items-center gap-3">
                            <input type="checkbox" name="compact_view" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="text-sm text-gray-700">Use compact dashboard layout</span>
                        </label>

                        <div class="pt-2">
                            <x-primary-button>{{ __('Save Settings') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
