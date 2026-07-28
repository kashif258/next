import Link from "next/link";
import { Navbar } from "@/components/layout/navbar";
import { Footer } from "@/components/layout/footer";
import { ScrollIndicator } from "@/components/animations/scroll-indicator";
import { AnimatedSection } from "@/components/animations/animated-section";
import { GsapReveal } from "@/components/animations/gsap-reveal";

export default function Home() {
  return (
    <main className="min-h-screen">
      <Navbar />
      <section className="relative flex min-h-screen items-center overflow-hidden border-b border-white/10">
        <video
          className="absolute inset-0 h-full w-full object-cover"
          autoPlay
          muted
          loop
          playsInline
          poster="/images/hero-poster.jpg"
        >
          <source src="/videos/hero.mp4" type="video/mp4" />
        </video>
        <div className="absolute inset-0 bg-[linear-gradient(90deg,rgba(4,7,11,0.9)_0%,rgba(4,7,11,0.6)_45%,rgba(4,7,11,0.8)_100%)]" />
        <div className="section-shell relative z-10 min-h-screen justify-center">
          <div className="max-w-4xl space-y-8">
            <p className="eyebrow">Aurelia Studio / Digital Luxury</p>
            <h1 className="text-5xl font-semibold leading-[0.92] tracking-[-0.03em] sm:text-7xl lg:text-8xl">
              Designing rare digital experiences for ambitious brands.
            </h1>
            <p className="max-w-2xl text-lg text-zinc-300 sm:text-xl">
              We blend cinematic storytelling, movement, and precision engineering to create websites that feel as elevated as the brands they represent.
            </p>
            <div className="flex flex-wrap gap-4 pt-4">
              <Link href="/contact" className="rounded-full border border-white/20 bg-white/10 px-6 py-3 text-sm font-medium text-white transition hover:bg-white/20">
                Start a project
              </Link>
              <Link href="/projects" className="rounded-full border border-[#d1a96f]/40 bg-[#d1a96f]/10 px-6 py-3 text-sm font-medium text-[#f0c777] transition hover:bg-[#d1a96f]/20">
                View work
              </Link>
            </div>
            <ScrollIndicator />
          </div>
        </div>
      </section>

      <AnimatedSection className="section-shell gap-10 py-20">
        <div className="grid gap-8 lg:grid-cols-[1.1fr_0.9fr]">
          <GsapReveal className="space-y-4">
            <p className="eyebrow">Selected clients</p>
            <h2 className="text-3xl font-semibold sm:text-4xl">Trusted by founders who value distinction.</h2>
          </GsapReveal>
          <div className="grid gap-4 sm:grid-cols-3">
            {['Lumen', 'Atelier', 'Northstar', 'Vanta', 'Astra', 'Monarch'].map((client) => (
              <div key={client} className="glass-panel rounded-2xl px-5 py-4 text-center text-sm uppercase tracking-[0.35em] text-zinc-300">
                {client}
              </div>
            ))}
          </div>
        </div>
      </AnimatedSection>

      <Footer />
    </main>
  );
}
