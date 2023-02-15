<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    title: "",
    location: "",
    deadline: "",
});

const submit = () => {
    form.post(route("job_opening.store"));
};
</script>

<template>
    <Head title="Create Job opening" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-start py-4">
                    <Link
                        class="text-gray-600 flex items-center"
                        :href="route('job_opening.index')"
                        ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="none"
                            class="mr-2 h-5 w-5 rotate-180 transform"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 0 1 0-1.414L10.586 10 7.293 6.707a1 1 0 0 1 .012-1.402 1 1 0 0 1 1.402-.012l4 4a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414 0z"
                                fill="currentColor"
                            ></path>
                        </svg>
                        Back
                    </Link>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit">
                            <section
                                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4"
                            >
                                <div>
                                    <InputLabel for="title" value="Title" />

                                    <TextInput
                                        id="title"
                                        type="text"
                                        v-model="form.title"
                                        class="mt-1 block w-full"
                                        required
                                        autofocus
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.title"
                                    />
                                </div>
                                <div>
                                    <InputLabel
                                        for="location"
                                        value="Location"
                                    />

                                    <TextInput
                                        id="location"
                                        type="text"
                                        v-model="form.location"
                                        class="mt-1 block w-full"
                                        required
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.location"
                                    />
                                </div>
                                <div>
                                    <InputLabel
                                        for="deadline"
                                        value="Deadline"
                                    />

                                    <TextInput
                                        id="deadline"
                                        v-model="form.deadline"
                                        type="datetime-local"
                                        class="mt-1 block w-full"
                                        required
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.deadline"
                                    />
                                </div>
                            </section>

                            <div class="flex justify-end pt-4">
                                <button
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 mt-4 sm:mt-0 inline-flex items-start justify-start px-6 py-3 bg-indigo-700 hover:bg-indigo-600 focus:outline-none rounded"
                                >
                                    <p
                                        class="text-sm font-medium leading-none text-white"
                                    >
                                        Create
                                    </p>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
