<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, router } from "@inertiajs/vue3";

const { jobs } = defineProps({
    jobs: Array,
});

const applyToJob = (jobId) => {
    if (confirm("Are you sure?")) {
        router.post(route("job.store"), {
            job_opening_id: jobId,
        });
    }
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <table class="min-w-max w-full table-auto overflow-x-auto">
                        <thead>
                            <tr
                                class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal"
                            >
                                <th class="py-3 px-6 text-left">Title</th>
                                <th class="py-3 px-6 text-left">Localtion</th>
                                <th class="py-3 px-6 text-center">
                                    Created at
                                </th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr
                                v-for="job in jobs"
                                class="border-b border-gray-200 hover:bg-gray-100"
                            >
                                <td
                                    class="py-3 px-6 text-left whitespace-nowrap"
                                >
                                    <span class="font-medium">{{
                                        job.title
                                    }}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span>{{ job.location }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    {{ job.created_at }}
                                </td>

                                <td class="py-3 px-6 text-center">
                                    <div
                                        @click="applyToJob(job.id)"
                                        class="flex item-center justify-center"
                                    >
                                        <div
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5"
                                                />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
