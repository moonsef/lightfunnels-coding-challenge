<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";

const { job_openings } = defineProps({
    job_openings: Array,
});
</script>

<template>
    <Head title="Job Opening" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-end p-5">
                        <Link
                            :href="route('job_opening.create')"
                            class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded"
                        >
                            <p
                                class="text-sm font-medium leading-none text-white"
                            >
                                Add Job opening
                            </p>
                        </Link>
                    </div>

                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr
                                class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal"
                            >
                                <th class="py-3 px-6 text-left">Title</th>
                                <th class="py-3 px-6 text-left">Localtion</th>
                                <th class="py-3 px-6 text-center">
                                    Created at
                                </th>
                                <th class="py-3 px-6 text-center">Deadline</th>
                                <th class="py-3 px-6 text-center">Status</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            <tr
                                v-for="job_opening in job_openings"
                                class="border-b border-gray-200 hover:bg-gray-100"
                            >
                                <td
                                    class="py-3 px-6 text-left whitespace-nowrap"
                                >
                                    <span class="font-medium">{{
                                        job_opening.title
                                    }}</span>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <span>{{ job_opening.location }}</span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    {{ job_opening.created_at }}
                                </td>
                                <td class="py-3 px-6 text-center">
                                    {{ job_opening.deadline }}
                                </td>
                                <td
                                    v-if="job_opening.is_closed"
                                    class="py-3 px-6 text-center"
                                >
                                    <span
                                        class="bg-red-600 px-2 py-0.5 text-white font-semibold rounded-lg"
                                    >
                                        Close
                                    </span>
                                </td>
                                <td v-else class="py-3 px-6 text-center">
                                    <span
                                        class="bg-green-600 px-2 py-0.5 text-white font-semibold rounded-lg"
                                    >
                                        Open
                                    </span>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div
                                        class="flex item-center justify-center"
                                    >
                                        <div
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
                                                />
                                            </svg>
                                        </div>
                                        <div
                                            class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
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
