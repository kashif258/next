"use client";

import { useForm } from "react-hook-form";
import { zodResolver } from "@hookform/resolvers/zod";
import { z } from "zod";
import { Button } from "@/components/ui/button";

const contactSchema = z.object({
  name: z.string().min(2, "Please enter your name."),
  email: z.string().email("Please enter a valid email address."),
  project: z.string().min(10, "Tell us a bit more about the project."),
});

type ContactFormValues = z.infer<typeof contactSchema>;

export function ContactForm() {
  const {
    register,
    handleSubmit,
    formState: { errors, isSubmitting },
    reset,
  } = useForm<ContactFormValues>({ resolver: zodResolver(contactSchema) });

  const onSubmit = async (data: ContactFormValues) => {
    await new Promise((resolve) => setTimeout(resolve, 600));
    reset();
    window.alert(`Thanks ${data.name}! We will follow up soon.`);
  };

  return (
    <form onSubmit={handleSubmit(onSubmit)} className="space-y-4">
      <div>
        <input
          {...register("name")}
          className="w-full rounded-full border border-white/10 bg-white/5 px-4 py-3 text-white outline-none placeholder:text-zinc-500"
          placeholder="Name"
        />
        {errors.name ? <p className="mt-2 text-sm text-[#f0c777]">{errors.name.message}</p> : null}
      </div>
      <div>
        <input
          {...register("email")}
          className="w-full rounded-full border border-white/10 bg-white/5 px-4 py-3 text-white outline-none placeholder:text-zinc-500"
          placeholder="Email"
        />
        {errors.email ? <p className="mt-2 text-sm text-[#f0c777]">{errors.email.message}</p> : null}
      </div>
      <div>
        <textarea
          {...register("project")}
          className="min-h-32 w-full rounded-[1.5rem] border border-white/10 bg-white/5 px-4 py-3 text-white outline-none placeholder:text-zinc-500"
          placeholder="Tell us about your project"
        />
        {errors.project ? <p className="mt-2 text-sm text-[#f0c777]">{errors.project.message}</p> : null}
      </div>
      <Button variant="primary" type="submit" disabled={isSubmitting}>
        {isSubmitting ? "Sending..." : "Send inquiry"}
      </Button>
    </form>
  );
}
