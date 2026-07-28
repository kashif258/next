import { buildMetadata } from "@/lib/seo";
import { Navbar } from "@/components/layout/navbar";
import { Footer } from "@/components/layout/footer";
import { SectionHeading } from "@/components/sections/section-heading";
import { FeatureCard } from "@/components/sections/feature-card";
import { Button } from "@/components/ui/button";
import Link from "next/link";

export const metadata = buildMetadata({
  title: "Services",
  description: "Discreet, high-end digital experiences tailored for modern brands.",
});

const services = [
  {
    title: "Brand Systems",
    description: "Identity foundations, launch narratives, and digital design systems that feel intentional from the first glance.",
  },
  {
    title: "Web Experiences",
    description: "Thoughtful marketing sites and interactive product experiences built for clarity, motion, and conversion.",
  },
  {
    title: "Creative Direction",
    description: "Editorial storytelling with refined art direction that maintains elegance at every screen size.",
  },
];

export default function ServicesPage() {
  return (
    <div className="min-h-screen bg-[#04070b]">
      <Navbar />
      <main>
        <section className="section-shell gap-10 py-24">
          <SectionHeading
            eyebrow="Services"
            title="A refined studio for digital storytelling and product elegance."
            description="Every engagement is shaped around clarity, cinematic pacing, and a premium visual language."
          />
          <div className="mt-12 grid gap-6 lg:grid-cols-3">
            {services.map((service, index) => (
              <FeatureCard key={service.title} index={index + 1} title={service.title} description={service.description} />
            ))}
          </div>
        </section>
        <section className="section-shell border-t border-white/10 py-20">
          <div className="glass-panel rounded-[2rem] p-10 lg:flex lg:items-end lg:justify-between">
            <div className="max-w-2xl">
              <p className="eyebrow">Ready to begin</p>
              <h3 className="mt-3 text-3xl font-semibold tracking-[-0.03em] text-white">
                Let’s shape an experience worthy of your next chapter.
              </h3>
            </div>
            <Link href="/contact">
              <Button variant="primary" size="lg" className="mt-6 lg:mt-0">
                Schedule a discovery call
              </Button>
            </Link>
          </div>
        </section>
      </main>
      <Footer />
    </div>
  );
}
