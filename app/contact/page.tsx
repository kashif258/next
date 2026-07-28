import { buildMetadata } from "@/lib/seo";
import { Navbar } from "@/components/layout/navbar";
import { Footer } from "@/components/layout/footer";
import { SectionHeading } from "@/components/sections/section-heading";
import { ContactForm } from "@/components/forms/contact-form";

export const metadata = buildMetadata({
  title: "Contact",
  description: "Begin a new project or discuss a refined digital launch.",
});

export default function ContactPage() {
  return (
    <div className="min-h-screen bg-[#04070b]">
      <Navbar />
      <main>
        <section className="section-shell gap-10 py-24">
          <SectionHeading
            eyebrow="Contact"
            title="Start a conversation for something extraordinary."
            description="Tell us about your brand, your ambition, and the experience you want to create."
          />
          <div className="mt-10 grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div className="glass-panel rounded-[2rem] p-8">
              <p className="text-zinc-300">
                We are currently accepting select projects for the coming season. Reach out with a brief overview and we will respond with thoughtful next steps.
              </p>
            </div>
            <div className="glass-panel rounded-[2rem] p-8">
              <ContactForm />
            </div>
          </div>
        </section>
      </main>
      <Footer />
    </div>
  );
}
