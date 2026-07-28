import { buildMetadata } from "@/lib/seo";
import { Navbar } from "@/components/layout/navbar";
import { Footer } from "@/components/layout/footer";
import { SectionHeading } from "@/components/sections/section-heading";
import { Button } from "@/components/ui/button";
import Link from "next/link";

export const metadata = buildMetadata({
  title: "Projects",
  description: "Selected work blending editorial storytelling with modern product design.",
});

const projects = [
  {
    name: "Lumen House",
    summary: "An elevated launch experience for a contemporary luxury brand.",
  },
  {
    name: "Northstar Lab",
    summary: "A product narrative and interface system for a high-growth software company.",
  },
  {
    name: "Atelier One",
    summary: "A cinematic digital presence designed to feel intimate and ambitious at once.",
  },
];

export default function ProjectsPage() {
  return (
    <div className="min-h-screen bg-[#04070b]">
      <Navbar />
      <main>
        <section className="section-shell gap-10 py-24">
          <SectionHeading
            eyebrow="Projects"
            title="Selected work created with precision, clarity, and cinematic pacing."
            description="Each release is designed to elevate perception, create trust, and leave a lasting impression."
          />
          <div className="mt-12 grid gap-6 lg:grid-cols-3">
            {projects.map((project) => (
              <article key={project.name} className="glass-panel rounded-[1.75rem] p-8">
                <p className="eyebrow">Featured</p>
                <h3 className="mt-4 text-2xl font-semibold text-white">{project.name}</h3>
                <p className="mt-4 text-zinc-300">{project.summary}</p>
                <Link href="/contact" className="mt-8 inline-flex">
                  <Button variant="ghost">Discuss this work</Button>
                </Link>
              </article>
            ))}
          </div>
        </section>
      </main>
      <Footer />
    </div>
  );
}
